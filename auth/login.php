<?php
session_start();

require_once "../config/database.php";
require_once "../config/helper.php";
require_once "../queries/user.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: ../../index.php");
  exit;
}

$ruleLogin = [
  'username' => [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
      $cleanValue = trim($value);
      return htmlspecialchars($cleanValue, ENT_QUOTES, 'UTF-8');
    },
  ],
  'password' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^.{8,}$/'],
    'pesan' => "Password minimal harus terdiri dari 8 karakter."
  ],
];

$validated = validate($_POST, $ruleLogin);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => $_POST
  ]);

  header("Location: ../login.php");
  exit();
}

$user = getUser($pdo, $validated['data']['username'], 'username');

if ($user && password_verify($_POST['password'], $user['password_hash'])) {
  unsetSession(['errors', 'old']);
  setSession([
    'user' => [
      'id'         => $user['id'],
      'username'   => $user['username'],
      'anggota_id' => $user['anggota_id'],
      'role'       => $user['role']
    ],
  ]);

  echo "Berhasil Login";
} else {
  setSession([
    'errors' => ['Username atau password salah'],
    'old' => $_POST
  ]);

  header("Location: ../login.php");
  exit();
}
