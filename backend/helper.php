<?php

function getUser(string $value, string $column)
{
  global $pdo;

  $allowedColumns = [
    'id'           => 'users.id',
    'username'     => 'users.username',
    'email'        => 'users.email',
    'nama_lengkap' => 'users.nama_lengkap'
  ];

  if (!array_key_exists($column, $allowedColumns)) {
    return "Kolom pencarian tidak valid";
  }

  $targetColumn = $allowedColumns[$column];

  try {
    $sql = "SELECT users.*, anggota.deleted_at FROM users INNER JOIN anggota ON users.anggota_id = anggota.id  WHERE {$targetColumn} = ? AND anggota.deleted_at IS NULL LIMIT 1";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$value]);
    $user = $stmt->fetch();

    if (!$user) {
      return false;
    }

    return $user;
  } catch (PDOException $e) {
    echo "<h3>Terjadi Kesalahan Query SQL:</h3>";
    echo $e->getMessage();
    exit;
  }
}

function validate(array $inputData, array $rules)
{
  $data_valid = filter_var_array($inputData, $rules);

  $errors = [];
  foreach ($data_valid as $key => $value) {
    if ($value === false || $value === null || empty($value) || (is_string($value) && trim($value) === '')) {
      $errors[$key] = "Input Kolom " . ucfirst($key) . " tidak valid atau kosong.";
    }
  }

  return
    [
      'success' => empty($errors),
      'errors' => $errors,
      'data' => $data_valid,
    ];
}

function setSession(array $sessions)
{
  foreach ($sessions as $key => $value) {
    $_SESSION[$key] = $value;
  }
}

function unsetSession(array $sessions)
{
  foreach ($sessions as $key) {
    unset($_SESSION[$key]);
  }
}

function showErrorMessage(?string $error, string $default)
{
  if (!empty($error) && isset($error)) {
    return "<span class='error-message' role='alert'>{$error}</span>";
  }

  return $default;
}
