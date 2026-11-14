<?php
session_start();
include_once "../../../config/database.php";
include_once "../../../config/helper.php";
include_once "../../../queries/anggota.php";

// 1. Pastikan diakses lewat metode POST dari form modal
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  redirectTo("pengurus/anggota");
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);


if (!$id || $id <= 0) {
  setSession([
    'errors' => ['database' => "ID anggota tidak valid."]
  ]);
  session_write_close();
  redirectTo("pengurus/anggota/index");
}

$hapus = softDeleteAnggotaAndUser($pdo, $id);

if (!$hapus['success']) {
  setSession([
    'errors' => ['database' => $hapus['pesan']]
  ]);
  session_write_close();
  redirectTo("pengurus/anggota/index");
}


// 4. Berhasil dihapus
setSession([
  'success' => [
    'title' => 'Berhasil menghapus anggota',
    'message' => 'Anggota berhasil dihapus dan akun login telah dinonaktifkan.'
  ],
]);

redirectTo("pengurus/anggota/index");
