<?php

function getAnggota(PDO $pdo, int $page, int $limit, string $q)
{
  $p = max(1, $page);
  $awalData = ($p - 1) * $limit;

  $whereSql = "WHERE deleted_at IS NULL";
  $params = [];
  if ($q !== "" && isset($q)) {
    $whereSql .= " AND (nama_lengkap LIKE :q1 OR nim LIKE :q2)";
    $params[':q1'] = "%$q%";
    $params[':q2'] = "%$q%";
  }

  $stmtTotal = $pdo->prepare("SELECT COUNT(*) FROM anggota $whereSql");
  $stmtTotal->execute($params);
  $totalData = $stmtTotal->fetchColumn();
  $totalHalaman = ceil($totalData / $limit);


  $query = "SELECT * FROM anggota $whereSql  ORDER BY id DESC LIMIT :batas OFFSET :awal";
  $stmt = $pdo->prepare($query);

  foreach ($params as $key => $val) {
    $stmt->bindValue($key, $val, PDO::PARAM_STR);
  }
  $stmt->bindValue(':batas', $limit, PDO::PARAM_INT);
  $stmt->bindValue(':awal', $awalData, PDO::PARAM_INT);
  $stmt->execute();

  return [
    'anggota' => $stmt->fetchAll(PDO::FETCH_ASSOC),
    'totalHalaman' => $totalHalaman,
    'totalAnggota' => $totalData,
    'halamanAktif' => $p,
    'awalData'     => $awalData
  ];
}

function cekAnggota(PDO $pdo, string $nim, int $excludeId = -1)
{
  $query = "SELECT COUNT(*) FROM anggota WHERE nim = ? AND deleted_at IS NULL";
  $params = [$nim];
  if ($excludeId > -1) {
    $query .= ' AND id != ?';
    $params[] = $excludeId;
  }
  $stmt = $pdo->prepare($query);
  $stmt->execute($params);

  return $stmt->fetchColumn() > 0;
}

function createAnggotaAndUser(PDO $pdo, array $data)
{
  try {
    $pdo->beginTransaction();
    createAnggota($pdo, $data);

    $anggotaIdBaru = $pdo->lastInsertId();
    $nimBersih = strtolower($data['nim']);

    $sqlUser = "INSERT INTO users (anggota_id, username, password_hash, role) 
                    VALUES (:anggota_id, :username, :password_hash, :role)";
    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute([
      ':anggota_id' => $anggotaIdBaru,
      ':username'   => $nimBersih,
      ':password_hash' => password_hash('12345678', PASSWORD_BCRYPT),
      ':role' => 'anggota',
    ]);
    $pdo->commit();

    return ['success' => true];
  } catch (PDOException $e) {
    if ($pdo->inTransaction()) {
      $pdo->rollBack();
    }
    return [
      'success' => false,
      'pesan'   => "Terjadi kesalahan database: " . $e->getMessage()
    ];
  }
}

function updateAnggotaAndUser(PDO $pdo, array $data, int $id)
{
  try {
    $pdo->beginTransaction();

    updateAnggota($pdo, $data, $id);

    $nimBersih = strtolower($data['nim']);

    $sqlUser = "UPDATE users 
                    SET username = :username 
                    WHERE anggota_id = :anggota_id";

    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute([
      ':username'   => $nimBersih,
      ':anggota_id' => $id
    ]);

    // 4. Simpan permanen kedua perubahan
    $pdo->commit();

    return ['success' => true];
  } catch (PDOException $e) {
    // Batalkan semua perubahan jika salah satu query gagal
    if ($pdo->inTransaction()) {
      $pdo->rollBack();
    }

    return [
      'success' => false,
      'pesan'   => "Terjadi kesalahan database: " . $e->getMessage()
    ];
  }
}

function createAnggota(PDO $pdo, array $data)
{
  $query = "INSERT INTO anggota (nama_lengkap, nim, prodi, no_hp, email, status_keanggotaan) 
  VALUES (:nama_lengkap, :nim, :prodi, :no_hp, :email, :status_keanggotaan)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    ':nama_lengkap'       => $data['nama_lengkap'],
    ':nim'                => $data['nim'],
    ':prodi'                => $data['prodi'],
    ':no_hp'              => $data['no_hp'],
    ':email'              => $data['email'],
    ':status_keanggotaan' => $data['status_keanggotaan'],
  ]);
}

function updateAnggota(PDO $pdo, array $data, int $id)
{
  $query = "UPDATE anggota SET
  nama_lengkap = :nama_lengkap, 
  nim = :nim, 
  prodi = :prodi,
  no_hp = :no_hp, 
  email = :email, 
  status_keanggotaan = :status_keanggotaan 
  WHERE id = :id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    ':nama_lengkap'       => $data['nama_lengkap'],
    ':nim'                => $data['nim'],
    ':prodi'                => $data['prodi'],
    ':no_hp'              => $data['no_hp'],
    ':email'              => $data['email'],
    ':status_keanggotaan' => $data['status_keanggotaan'],
    ':id'                 => $id
  ]);
}

function softDeleteAnggotaAndUser(PDO $pdo, int $id)
{
  try {
    $pdo->beginTransaction();

    // 1. Soft delete di tabel anggota (isi deleted_at & ubah status jadi nonaktif)
    $sqlAnggota = "UPDATE anggota 
                      SET deleted_at = NOW(), 
                          status_keanggotaan = 'tidak_aktif' 
                      WHERE id = :id AND deleted_at IS NULL";
    $stmtAnggota = $pdo->prepare($sqlAnggota);
    $stmtAnggota->execute([':id' => $id]);

    // Pastikan baris anggota benar-benar ada dan belum terhapus sebelumnya
    if ($stmtAnggota->rowCount() === 0) {
      throw new Exception("Data anggota tidak ditemukan atau sudah dihapus sebelumnya.");
    }

    // 2. Nonaktifkan / soft delete akun di tabel users
    // Catatan: Sesuaikan dengan struktur tabel users Anda (misal kolom deleted_at atau is_active)
    $sqlUser = "UPDATE users 
                    SET is_active = 0
                    WHERE anggota_id = :anggota_id";
    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute([':anggota_id' => $id]);

    $pdo->commit();

    return ['success' => true];
  } catch (Exception $e) {
    if ($pdo->inTransaction()) {
      $pdo->rollBack();
    }

    return [
      'success' => false,
      'pesan'   => "Gagal menghapus data: " . $e->getMessage()
    ];
  }
}

function getAnggotaFirst(PDO $pdo, int $id)
{
  $query = "SELECT * FROM anggota WHERE id = ? AND deleted_at IS NULL";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$id]);

  return $stmt->fetch();
}
