<?php

function getUser(PDO $pdo, string $value, string $column)
{
  $allowedColumns = [
    'id'           => 'users.id',
    'username'     => 'users.username',
  ];

  if (!array_key_exists($column, $allowedColumns)) {
    return false;
  }

  $targetColumn = $allowedColumns[$column];

  try {
    $sql = "SELECT users.*, anggota.deleted_at FROM users INNER JOIN anggota ON users.anggota_id = anggota.id  WHERE {$targetColumn} = ? AND anggota.deleted_at IS NULL LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$value]);

    return $stmt->fetch();
  } catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    return false;
  }
}
