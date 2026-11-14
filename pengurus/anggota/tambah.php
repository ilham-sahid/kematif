<?php
session_start();
include_once "../../config/helper.php";
include_once "../../queries/anggota.php";

handleRedirect("pengurus", $_SESSION['isLoggedIn'] ?? false, $_SESSION['user'] ?? []);

if (isset($_POST['logout'])) {
  Logout();
}

extract(getSessionByKey(['errors', 'old']));
unsetSession(['errors', 'old']);
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f7fafc">
  <meta name="description" content="Formulir untuk menambahkan data anggota baru ke dalam portal KEMATIF.">
  <meta name="robots" content="noindex, nofollow">
  <title>Tambah Anggota | Portal Pengurus KEMATIF</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../styles.css">
  <link rel="stylesheet" href="../../portal.css">
</head>

<body class="portal-page portal-pengurus portal-member-add">
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
            <a class="portal-nav-link" href="../dokumen.php">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 7.5A1.5 1.5 0 0 1 4.5 6H10l2 2h7.5A1.5 1.5 0 0 1 21 9.5v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18.5v-11Z"></path>
              </svg>
              <span>Dokumen</span>
              <span class="portal-coming-soon">Tahap berikut</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <main class="portal-main" id="konten-utama">
      <div class="portal-content">
        <nav class="member-add-breadcrumbs" aria-label="Breadcrumb">
          <ol>
            <li><a href="index.php">Data Anggota</a></li>
            <li aria-hidden="true">
              <svg class="portal-icon" viewBox="0 0 24 24">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </li>
            <li aria-current="page">Tambah Anggota</li>
          </ol>
        </nav>

        <header class="member-add-heading">
          <h1>Tambah Anggota</h1>
          <p>Isi data anggota baru, lalu simpan</p>
        </header>

        <form class="member-add-card" action="proses/tambah.php" method="post">
          <div class="member-add-body">
            <header class="member-add-form-heading">
              <?php
              if ($errors) {
              ?>
                <div class="form-error-summary">
                  <span class="summary-error-icon" aria-hidden="true">!</span>

                  <div>
                    <strong><?= $errors['cekAnggota'] ? "Gagal Disimpan" : "Data Belum Lengkap" ?></strong>
                    <p><?= $errors['cekAnggota'] ? $errors['cekAnggota'] : 'Lengkapi kolom yang wajib diisi sebelum menyimpan.' ?></p>
                  </div>
                </div>
              <?php
              }
              ?>
              <h2>Data Anggota</h2>
              <p>Kolom bertanda <span aria-hidden="true">*</span> wajib diisi</p>
            </header>

            <div class="member-add-fields">
              <div class="member-add-field">
                <label for="member-name">Nama Lengkap <span>*</span></label>
                <input class="member-add-control <?= errorCSS($errors['nama_lengkap']) ?>" type="text" id="member-name" name="nama_lengkap" placeholder="Masukkan nama lengkap" autocomplete="name" value="<?= htmlspecialchars($old['nama_lengkap']) ?>">
                <?= showErrorMessage($errors['nama_lengkap'] ?? null, '') ?>
              </div>

              <div class="member-add-field">
                <label for="member-nim">NIM <span>*</span></label>
                <input class="member-add-control <?= errorCSS($errors['nim']) ?>" type="text" id="member-nim" name="nim" placeholder="E41261xxx" autocomplete="off" value="<?= htmlspecialchars($old['nim']) ?>">
                <?= showErrorMessage($errors['nim'] ?? null, '<small class="field-hint">nim harus diawali e/E terus dilanjuti 8 angka</small>') ?>
              </div>

              <div class="member-add-field">
                <label for="member-program">Program Studi</label>
                <input class="member-add-control" type="text" id="member-program" name="prodi" placeholder="Masukkan program studi" value="<?= htmlspecialchars($old['prodi']) ?>">
              </div>

              <div class="member-add-field">
                <label for="member-email">Email</label>
                <input class="member-add-control <?= errorCSS($errors['email']) ?>" type="text" id="member-email" name="email" placeholder="nama@email.com" value="<?= htmlspecialchars($old['email']) ?>">
                <?= showErrorMessage($errors['email'] ?? null, '') ?>
              </div>

              <div class="member-add-field">
                <label for="member-phone">No. HP</label>
                <input class="member-add-control <?= errorCSS($errors['no_hp']) ?>" type="tel" id="member-phone" name="no_hp" placeholder="08xxxxxxxxxx" autocomplete="tel" inputmode="tel" aria-describedby="member-phone-hint" value="<?= htmlspecialchars($old['no_hp']) ?>">
                <?= showErrorMessage($errors['no_hp'] ?? null, '<small class="member-add-hint" id="member-phone-hint">Diawali 08 atau +62</small>') ?>
              </div>

              <fieldset class="member-add-field member-add-status-field">
                <legend>Status Keanggotaan</legend>
                <div class="member-add-status-options">
                  <label class="member-add-status-option">
                    <input type="radio" name="status_keanggotaan" value="aktif" checked>
                    <span class="member-add-radio" aria-hidden="true"></span>
                    <span>Aktif</span>
                  </label>
                  <label class="member-add-status-option">
                    <input type="radio" name="status_keanggotaan" value="tidak_aktif">
                    <span class="member-add-radio" aria-hidden="true"></span>
                    <span>Tidak Aktif</span>
                  </label>
                </div>
              </fieldset>
            </div>

            <aside class="member-add-notice">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M12 10.5v5M12 7.5h.01"></path>
              </svg>
              <p>Akun login dibuat otomatis dengan NIM sebagai username. Kata sandi awal ditampilkan satu kali setelah data disimpan, lalu disampaikan kepada anggota.</p>
            </aside>
          </div>

          <footer class="member-add-footer">
            <p>Setelah disimpan, Anda kembali ke Daftar Anggota</p>
            <div class="member-add-actions">
              <a class="member-add-button member-add-cancel" href="index.php">Batal</a>
              <button class="member-add-button member-add-save" type="submit">
                <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="m5 12 4.5 4.5L19 7"></path>
                </svg>
                Simpan
              </button>
            </div>
          </footer>
        </form>
      </div>
    </main>
  </div>

</body>

</html>