<?php
session_start();
include_once "../../../config/database.php";
include_once "../../../config/helper.php";
include_once "../../../queries/anggota.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  redirectTo("index");
}

$_POST = array_map('trim', $_POST);
$id = $_POST['id'];

$ruleEdit = [
  'nama_lengkap' => [],
  'nim' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^[eE]\d{8}$/'],
    'pesan' => "NIM harus diawali e/E dilanjutkan 8 digit angka."
  ],
  'prodi' => [
    'type' => 'optional',
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

$validated = validate($_POST, $ruleEdit);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => $_POST
  ]);

  session_write_close(); // Paksa PHP menyimpan session sekarang juga
  redirectTo("pengurus/anggota/edit", "?id=$id");
}

if (cekAnggota($pdo, $validated['data']['nim'], $id)) {
  setSession([
    'errors' => ['cekAnggota' => "NIM sudah digunakan oleh anggota lain."],
    'old'    => $_POST
  ]);

  redirectTo("pengurus/anggota/edit", "?id=$id");
}

$update = updateAnggotaAndUser($pdo, $validated['data'], $id);


if (!$update['success']) {
  setSession([
    'errors' => ['database' => $update['pesan']],
    'old'    => $_POST
  ]);
  dd($update['pesan']);
  redirectTo("pengurus/anggota/tambah");
}

setSession([
  'success' => [
    'title' => 'Data anggota berhasil diedit',
    'message' => 'Anggota telah berhasil di edit'
  ],
]);

redirectTo('pengurus/anggota/index');
