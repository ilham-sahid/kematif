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


  $query = "SELECT * FROM anggota $whereSql LIMIT :batas OFFSET :awal";
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

function cekAnggota(PDO $pdo, string $nim)
{
  $query = "SELECT COUNT(*) FROM anggota WHERE nim = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$nim]);

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

function createAnggota(PDO $pdo, array $data)
{
  $query = "INSERT INTO anggota (nama_lengkap, nim, no_hp, email, status_keanggotaan) 
  VALUES (:nama_lengkap, :nim, :no_hp, :email, :status_keanggotaan)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute($data);
}
