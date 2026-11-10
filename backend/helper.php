<?php

function getUser(string $value, string $column)
{
  global $pdo;

  $allowedColumns = [
    'id'           => 'users.id',
    'username'     => 'users.username',
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
  foreach ($rules as $key => $ruleConfig) {
    $value = $data_valid[$key] ?? null;

    if ($value === false || $value === null || (is_string($value) && trim($value) === '')) {
      if (is_array($ruleConfig) and isset($ruleConfig['pesan'])) {
        $errors[$key] = $ruleConfig['pesan'];
      } else {
        $errors[$key] = "Input Kolom " . ucfirst($key) . " tidak valid atau kosong.";
      }
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
    return "<span class='field-error' role='alert'><span class='field-error-icon' aria-hidden='true'>!</span>{$error}</span>";
  }

  return $default;
}
