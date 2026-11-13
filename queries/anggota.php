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
