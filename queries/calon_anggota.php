<?php

function cekCalonAnggota(PDO $pdo, string $nim)
{
  $query = "SELECT COUNT(*) FROM anggota WHERE nim = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$nim]);

  return $stmt->fetchColumn() > 0;
}

function createCalonAnggota(PDO $pdo, array $data)
{
  $query = "INSERT INTO calon_anggota (nama_lengkap, nim, prodi, email, no_hp, alasan_bergabung, status) VALUES (:nama_lengkap, :nim, :prodi, :email, :no_hp, :alasan_bergabung, 'pending')";
  $stmt = $pdo->prepare($query);

  return $stmt->execute($data);
}
