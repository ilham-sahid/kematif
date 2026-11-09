<?php
session_start();

require_once "../database.php";
require_once "../helper.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: ../../index.html");
  exit;
}

$ruleLogin = [
  'username' => FILTER_SANITIZE_SPECIAL_CHARS,
  'password' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^.{8,}$/'],
  ],
];

$validated = validate($_POST, $ruleLogin);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => $_POST
  ]);

  header("Location: ../../login.php");
  exit();
}

$user = getUser($validated['data']['username'], 'username');

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

  header("Location: ../../login.php");
  exit();
}
