<?php
session_start();

require_once "../config/database.php";
require_once "../config/helper.php";
require_once "../queries/user.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  redirectTo("index");
}

$_POST = array_map('trim', $_POST);

$ruleLogin = [
  'username' => [
    'filter' => FILTER_UNSAFE_RAW,
  ],
  'password' => [
    'filter' => FILTER_UNSAFE_RAW,
  ],
];

$validated = validate($_POST, $ruleLogin);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => ['username' => $_POST['username'] ?? '']
  ]);

  redirectTo("login");
}

$user = getUser($pdo, $validated['data']['username'], 'username');

if (!$user || !password_verify($validated['data']['password'], $user['password_hash'])) {
  setSession([
    'errors' => ['Username atau password salah'],
    'old' => ['username' => $_POST['username'] ?? '']
  ]);

  redirectTo("login");
}

unsetSession(['errors', 'old']);
session_regenerate_id(true);
setSession([
  'user' => [
    'id'         => $user['id'],
    'username'   => $user['username'],
    'anggota_id' => $user['anggota_id'],
    'role'       => $user['role']
  ],
]);

echo "Berhasil Login";
