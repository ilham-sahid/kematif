<?php
session_start();

require_once "../database.php";
require_once "../helper.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  header("Location: ../../index.html");
  exit();
}

$ruleDaftar = [
  'nama_lengkap' => '',
  'nim' => '',
  'prodi' => '',
  'email' => '',
  'no_hp' => '',
  'alasan_bergabung' => '',
];
