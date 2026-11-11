<?php
session_start();

require_once "../config/database.php";
require_once "../config/helper.php";
require_once "../queries/calon_anggota.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  redirectTo("daftar");
}

$_POST = array_map('trim', $_POST);

$ruleDaftar = [
  'nama_lengkap' => [],
  'nim' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^[eE]\d{8}$/'],
    'pesan' => "NIM harus diawali e/E dilanjutkan 8 digit angka."
  ],
  'prodi' => [],
  'email' => [
    'filter' => FILTER_VALIDATE_EMAIL,
    'pesan' => "Format email tidak valid."
  ],
  'no_hp' => [
    'filter' => FILTER_VALIDATE_REGEXP,
    'options' => ['regexp' => '/^(?:\+62|62|0)8[1-9][0-9]{6,10}$/'],
    'pesan' => "Format no hp tidak valid. pastikan formatnya sesuai"
  ],
  'alasan_bergabung' => [],
  'setuju' => [
    'filter' => FILTER_VALIDATE_BOOLEAN,
    'pesan' => "Harus menyetujui untuk mendaftar"
  ]
];

$validated = validate($_POST, $ruleDaftar);

if (!$validated['success']) {
  setSession([
    'errors' => $validated['errors'],
    'old' => $_POST
  ]);

  redirectTo("daftar");
}

unset($validated['data']['setuju']);

if (cekCalonAnggota($pdo, $validated['data']['nim'])) {
  setSession([
    'errors' => ['cekAnggota' => "Nim sudah terdaftar sebagai anggota"],
    'old' => $_POST
  ]);

  redirectTo("daftar");
}

if (!createCalonAnggota($pdo, $validated['data'])) {
  setSession([
    'errors' => ['createAnggota' => "Pendaftaran gagal"],
  ]);

  redirectTo("daftar");
}

unsetSession(['errors', 'old']);
setSession([
  'success' => [
    'title' => 'Data anggota berhasil disimpan',
    'message' => 'Tunggu persetujuan oleh pengurus. Dan login akun jika sudah disetujui oleh pengurus.'
  ]
]);

redirectTo("daftar");
