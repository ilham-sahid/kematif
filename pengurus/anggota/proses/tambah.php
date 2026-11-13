<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../../../config/database.php";
include_once "../../../config/helper.php";
include_once "../../../queries/anggota.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  redirectTo("index");
}

$_POST = array_map('trim', $_POST);

$ruleTambah = [
  'nama_lengkap' => [],
  'nim' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^[eE]\d{8}$/'],
    'pesan' => "NIM harus diawali e/E dilanjutkan 8 digit angka."
  ],
  'no_hp' => [
    'type'    => 'optional',
    'filter'  => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^08\d{8,11}$/'],
    'pesan'   => "Format Nomor HP tidak valid."
  ],
  'email' => [
    'type'    => 'optional',
    'filter'  => FILTER_VALIDATE_EMAIL,
  ],
  'status_keanggotaan' => [],
];

$validated = validate($_POST, $ruleTambah);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => $_POST
  ]);

  redirectTo("pengurus/anggota/tambah");
}

if (cekAnggota($pdo, $validated['data']['nim'])) {
  setSession([
    'errors' => ['cekAnggota' => "Nim sudah terdaftar sebagai anggota"],
    'old' => $_POST
  ]);

  redirectTo("pengurus/anggota/tambah");
}

$simpan = createAnggotaAndUser($pdo, $validated['data']);

if (!$simpan['success']) {
  setSession([
    'errors' => ['database' => $simpan['pesan']],
    'old'    => $_POST
  ]);
  dd($simpan['pesan']);
  redirectTo("pengurus/anggota/tambah");
}

setSession([
  'success' => [
    'title' => 'Data anggota berhasil disimpan',
    'message' => 'Anggota baru telah ditambahkan ke daftar dan akun loginnya telah dibuat.'
  ],
]);

redirectTo('pengurus/anggota/index');
