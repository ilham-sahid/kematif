<?php
session_start();

require_once "../config/database.php";
require_once "../config/helper.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header("Location: ../index.php");
  exit();
}

$ruleDaftar = [
  'nama_lengkap' => [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
      $cleanValue = trim($value);
      return htmlspecialchars($cleanValue, ENT_QUOTES, 'UTF-8');
    },
  ],
  'nim' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^[eE]\d{8}$/'],
    'pesan' => "NIM harus diawali e/E dilanjutkan 8 digit angka."
  ],
  'prodi' => [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
      $cleanValue = trim($value);
      return htmlspecialchars($cleanValue, ENT_QUOTES, 'UTF-8');
    },
  ],
  'email' => [
    'filter' => FILTER_VALIDATE_EMAIL,
    'pesan' => "Format email tidak valid."
  ],
  'no_hp' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^(?:\+62|62|0)8[1-9][0-9]{6,10}$/'],
    'pesan' => "Format no hp tidak valid. pastikan formatnya sesuai"
  ],
  'alasan_bergabung' => [
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
      $cleanValue = trim($value);
      return htmlspecialchars($cleanValue, ENT_QUOTES, 'UTF-8');
    },
  ],
  'setuju' => [
    'filter' => FILTER_VALIDATE_BOOLEAN,
    'pesan' => "Harus menyetujui untuk mendaftar"
  ]
];

$validate = validate($_POST, $ruleDaftar);

if (!$validate['success']) {
  setSession([
    'errors' => $validate['errors'],
    'old' => $_POST
  ]);

  header('Location: ../daftar.php');
  exit();
}
