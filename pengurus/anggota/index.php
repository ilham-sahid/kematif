<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../../config/database.php";
include_once "../../config/helper.php";
include_once "../../queries/anggota.php";
$page = (int) ($_GET['page'] ?? 1);
$search = trim((string) ($_GET['q'] ?? ''));
$limit = 10;

extract(getAnggota($pdo, $page, $limit, $search));
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f7fafc">
  <meta name="description" content="Halaman pengelolaan data anggota KEMATIF untuk melihat nama, NIM, dan status keanggotaan.">
  <meta name="robots" content="noindex, nofollow">
  <title>Daftar Anggota | Portal Pengurus KEMATIF</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../styles.css">
  <link rel="stylesheet" href="../../portal.css">
</head>

<body class="portal-page portal-pengurus portal-member-list">
  <a class="portal-skip-link" href="#konten-utama">Lewati ke konten utama</a>

  <header class="portal-topbar">
    <a class="portal-brand" href="../index.php" aria-label="KEMATIF, dashboard pengurus">
      <img src="../../logokematif.png" alt="Logo KEMATIF" width="150" height="70">
    </a>

    <details class="portal-profile">
      <summary aria-label="Menu profil Pengurus">
        <span class="portal-avatar" aria-hidden="true">P</span>
        <span class="portal-profile-copy">
          <strong>Pengurus</strong>
          <small>Ketua Himpunan</small>
        </span>
        <svg class="portal-icon portal-chevron" viewBox="0 0 24 24" aria-hidden="true">
          <path d="m6 9 6 6 6-6"></path>
        </svg>
      </summary>
      <form action="" method="post">
        <div class="portal-profile-menu">
          <button class="button-logout" type="button">Profil pengurus</button>
          <button class="button-logout" type="submit" name="logout">Keluar</button>
        </div>
      </form>
    </details>
  </header>

  <div class="portal-shell">
    <aside class="portal-sidebar" aria-label="Navigasi pengurus">
      <p class="portal-sidebar-heading">Menu</p>
      <nav aria-label="Menu utama pengurus">
        <ul class="portal-nav-list">
          <li>
            <a class="portal-nav-link" href="../index.php">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="3.5" y="3.5" width="6" height="6" rx="1"></rect>
                <rect x="14.5" y="3.5" width="6" height="6" rx="1"></rect>
                <rect x="3.5" y="14.5" width="6" height="6" rx="1"></rect>
                <rect x="14.5" y="14.5" width="6" height="6" rx="1"></rect>
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link is-active" href="index.php" aria-current="page">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                <circle cx="9.5" cy="7" r="3.5"></circle>
                <path d="M16 11a3.5 3.5 0 0 0 0-7M17 14.5a4 4 0 0 1 4 4V20"></path>
              </svg>
              <span>Data Anggota</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link" href="../pendaftaran.php">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                <path d="M9 4V2.8h6V4M9 10h6M9 14h6M9 18h3"></path>
              </svg>
              <span>Pendaftaran</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link" href="../kas.php">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                <path d="M3 9h18M16 14h2"></path>
              </svg>
              <span>Kas</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link portal-nav-link-muted" href="#dokumen" aria-describedby="dokumen-status">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 7.5a1.5 1.5 0 0 1 1.5-1.5H10l2 2h7.5A1.5 1.5 0 0 1 21 9.5v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18.5z"></path>
              </svg>
              <span>Dokumen</span>
              <small class="portal-coming-soon" id="dokumen-status">Tahap berikut</small>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <main class="portal-main" id="konten-utama">
      <div class="portal-content">
        <nav class="member-breadcrumbs" aria-label="Breadcrumb">
          <ol>
            <li><a href="../index.php">Data Anggota</a></li>
            <li aria-hidden="true">
              <svg class="portal-icon" viewBox="0 0 24 24">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </li>
            <li aria-current="page">Daftar Anggota</li>
          </ol>
        </nav>

        <header class="portal-page-heading member-page-heading">
          <div>
            <h1>Daftar Anggota</h1>
            <p class="portal-page-description">Kelola data dan status keanggotaan</p>
          </div>
        </header>

        <section class="member-toolbar" aria-label="Pencarian dan filter anggota">
          <form class="member-search" role="search" action="#" method="get">
            <button type="submit" class="member-search-icon-button" aria-label="Mulai pencarian">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="10.8" cy="10.8" r="6.8"></circle>
                <path d="m16 16 4.5 4.5"></path>
              </svg>

            </button>
            <label class="member-visually-hidden" for="member-search">Cari nama atau NIM</label>
            <input id="member-search" name="q" type="search" placeholder="Cari nama atau NIM">
          </form>

          <div class="member-filter">
            <label class="member-visually-hidden" for="member-status">Filter status anggota</label>
            <span>Status:</span>
            <select id="member-status" name="status">
              <option value="all" selected>Semua</option>
              <option value="active">Aktif</option>
              <option value="inactive">Tidak Aktif</option>
            </select>
            <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
              <path d="m6 9 6 6 6-6"></path>
            </svg>
          </div>

          <a class="member-add-button" href="<?= BASE_URL . "pengurus/anggota/tambah.php" ?>">
            <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 5v14M5 12h14"></path>
            </svg>
            <span>Tambah Anggota</span>
          </a>
        </section>

        <section class="member-table-card" aria-label="Daftar anggota KEMATIF">
          <div class="member-table-scroll" tabindex="0" aria-label="Tabel anggota, geser horizontal untuk melihat seluruh kolom">
            <table class="member-table">
              <thead>
                <tr>
                  <th class="member-col-number" scope="col">No</th>
                  <th class="member-col-name" scope="col">Nama</th>
                  <th class="member-col-nim" scope="col">NIM</th>
                  <th class="member-col-status" scope="col">Status</th>
                  <th class="member-col-actions" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $awal = $awalData;
                foreach ($anggota as $a) {
                  $awalData = $awalData + 1;
                ?>
                  <tr>
                    <td class="member-number"><?= $awalData ?></td>
                    <td>
                      <div class="member-name-cell">
                        <span class="member-initials"><?= getInitial($a['nama_lengkap']) ?></span>
                        <span><?= $a['nama_lengkap'] ?></span>
                      </div>
                    </td>
                    <td class="member-nim"><?= $a['nim'] ?></td>
                    <td><span class="member-status-pill is-active"><span></span><?= $a['status_keanggotaan'] ?><svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                          <path d="m6 9 6 6 6-6"></path>
                        </svg></span></td>
                    <td>
                      <div class="member-actions"><button class="member-action member-edit" type="button"><svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m14 5 5 5M4 20l4.2-.9L19 8.3a2.1 2.1 0 0 0-3-3L5.2 16.1 4 20Z"></path>
                          </svg>Edit</button><button class="member-action member-delete" type="button"><svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M4 7h16M10 11v6m4-6v6M6 7l1 14h10l1-14M9 7V4h6v3"></path>
                          </svg>Hapus</button></div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

          <footer class="member-table-footer">

            <p>Menampilkan <?= $awal + 1 ?> sampai <?= $awalData ?> dari <?= $totalAnggota ?> anggota</p>

            <?php if ($totalHalaman > 1) : ?>
              <nav class="member-pagination" aria-label="Navigasi halaman daftar anggota">
                <?php if ($halamanAktif > 1) : ?>
                  <a class="member-page-button" href="?page=<?= $halamanAktif - 1 ?>" aria-label="Halaman sebelumnya">
                    <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="m15 18-6-6 6-6"></path>
                    </svg>
                  </a>
                <?php else : ?>
                  <a class="member-page-button is-disabled" href="#" aria-label="Halaman sebelumnya" aria-disabled="true" tabindex="-1">
                    <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="m15 18-6-6 6-6"></path>
                    </svg>
                  </a>
                <?php endif; ?>
                <?php
                $jarak = 1;
                $halamanTampil = [];

                for ($i = 1; $i <= $totalHalaman; $i++) {
                  if ($i == 1 || $i == $totalHalaman || ($i >= $halamanAktif - $jarak && $i <= $halamanAktif + $jarak)) {
                    $halamanTampil[] = $i;
                  }
                }



                // Khusus halaman 1, tampilkan angka 3 juga agar sama dengan desain awal (1 2 3 ... 6)
                if ($halamanAktif == 1 && $totalHalaman >= 3 && !in_array(3, $halamanTampil)) {
                  $halamanTampil[] = 3;
                  sort($halamanTampil);
                }

                $sebelumnya = 0;
                foreach ($halamanTampil as $no) :
                  // Tampilkan titik-titik (...) jika nomor halaman melompat
                  if ($sebelumnya > 0 && $no - $sebelumnya > 1) : ?>
                    <span class="member-page-ellipsis" aria-hidden="true">...</span>
                  <?php endif; ?>

                  <!-- Tombol Nomor Halaman -->
                  <?php if ($no == $halamanAktif) : ?>
                    <a class="member-page-button is-current" href="?page=<?= $no ?>" aria-current="page"><?= $no ?></a>
                  <?php else : ?>
                    <a class="member-page-button" href="?page=<?= $no ?>"><?= $no ?></a>
                  <?php endif; ?>

                  <?php $sebelumnya = $no; ?>
                <?php endforeach; ?>

                <!-- Tombol Selanjutnya (>) -->
                <?php if ($halamanAktif < $totalHalaman) : ?>
                  <a class="member-page-button" href="?page=<?= $halamanAktif + 1 ?>" aria-label="Halaman selanjutnya">
                    <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </a>
                <?php else : ?>
                  <a class="member-page-button is-disabled" href="#" aria-label="Halaman selanjutnya" aria-disabled="true" tabindex="-1">
                    <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </a>
                <?php endif; ?>
              </nav>
            <?php endif; ?>
          </footer>
        </section>

        <p class="member-page-note">
          <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M12 11v5M12 7.5h.01"></path>
          </svg>
          <span>Klik badge status untuk mengubah Aktif atau Tidak Aktif. Tombol Hapus menyembunyikan anggota dari daftar dan menonaktifkan akunnya.</span>
        </p>
      </div>
    </main>
  </div>
</body>

</html>