<?php
session_start();
include_once "../config/helper.php";

if (!isLoggedIn()) {
  redirectTo("login");
}
if (isset($_POST['logout'])) {
  Logout();
}
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f7fafc">
  <meta name="description" content="Dashboard pengurus KEMATIF untuk melihat ringkasan anggota, pendaftaran, kas, dokumen, dan aktivitas organisasi.">
  <meta name="robots" content="noindex, nofollow">
  <title>Dashboard Pengurus | KEMATIF</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../portal.css">
</head>

<body class="portal-page portal-pengurus">
  <a class="portal-skip-link" href="#konten-utama">Lewati ke konten utama</a>

  <header class="portal-topbar">
    <a class="portal-brand" href="index.php" aria-label="KEMATIF, dashboard pengurus">
      <img src="../logokematif.png" alt="Logo KEMATIF" width="150" height="70">
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
      <nav>
        <ul class="portal-nav-list">
          <li>
            <a class="portal-nav-link is-active" href="index.php" aria-current="page">
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
            <a class="portal-nav-link" href="<?= BASE_URL . "pengurus/anggota/index.php" ?>">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                <circle cx="9.5" cy="7" r="3.5"></circle>
                <path d="M16 11a3.5 3.5 0 0 0 0-7M17 14.5a4 4 0 0 1 4 4V20"></path>
              </svg>
              <span>Data Anggota</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link" href="#pendaftaran">
              <svg class="portal-icon" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                <path d="M9 4V2.8h6V4M9 10h6M9 14h6M9 18h3"></path>
              </svg>
              <span>Pendaftaran</span>
            </a>
          </li>
          <li>
            <a class="portal-nav-link" href="#kas">
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
        <header class="portal-page-heading">
          <div>
            <p class="portal-eyebrow">Ruang kerja pengurus</p>
            <h1>Dashboard</h1>
            <p class="portal-page-description">Ringkasan data organisasi</p>
          </div>
        </header>

        <section class="portal-stat-grid" aria-label="Ringkasan organisasi">
          <article class="portal-stat-card">
            <div class="portal-stat-topline">
              <span>Anggota</span>
              <span class="portal-stat-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                  <circle cx="9.5" cy="7" r="3.5"></circle>
                  <path d="M16 11a3.5 3.5 0 0 0 0-7M17 14.5a4 4 0 0 1 4 4V20"></path>
                </svg>
              </span>
            </div>
            <strong class="portal-stat-value">42</strong>
            <small class="portal-stat-note">36 aktif, 6 tidak aktif</small>
          </article>

          <article class="portal-stat-card">
            <div class="portal-stat-topline">
              <span>Calon Anggota</span>
              <span class="portal-stat-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                  <path d="M9 4V2.8h6V4M9 10h6M9 14h6M9 18h3"></path>
                </svg>
              </span>
            </div>
            <strong class="portal-stat-value">7</strong>
            <small class="portal-stat-note">Menunggu diproses</small>
          </article>

          <article class="portal-stat-card">
            <div class="portal-stat-topline">
              <span>Kas Terkumpul</span>
              <span class="portal-stat-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                  <path d="M3 9h18M16 14h2"></path>
                </svg>
              </span>
            </div>
            <strong class="portal-stat-value portal-stat-currency">Rp 1.250.000</strong>
            <small class="portal-stat-note">Periode Oktober 2026</small>
          </article>

          <article class="portal-stat-card">
            <div class="portal-stat-topline">
              <span>Dokumen</span>
              <span class="portal-stat-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <path d="M3 7.5A1.5 1.5 0 0 1 4.5 6H10l2 2h7.5A1.5 1.5 0 0 1 21 9.5v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18.5z"></path>
                </svg>
              </span>
            </div>
            <strong class="portal-stat-value">15</strong>
            <small class="portal-stat-note">Arsip organisasi</small>
          </article>
        </section>

        <section class="portal-overview-grid" aria-label="Statistik dan aktivitas organisasi">
          <article class="portal-panel portal-members-panel">
            <header class="portal-panel-heading">
              <div>
                <h2>Anggota Aktif dan Tidak Aktif</h2>
                <p>Komposisi status keanggotaan</p>
              </div>
            </header>

            <div class="portal-members-content">
              <div class="portal-donut" role="img" aria-label="42 anggota: 36 aktif dan 6 tidak aktif">
                <div class="portal-donut-center">
                  <strong>42</strong>
                  <span>Total anggota</span>
                </div>
              </div>

              <div class="portal-legend" aria-label="Rincian status anggota">
                <div class="portal-legend-item">
                  <span class="portal-legend-dot is-active" aria-hidden="true"></span>
                  <div class="portal-legend-copy">
                    <strong>Aktif</strong>
                    <small>85,7% dari total</small>
                  </div>
                  <strong class="portal-legend-value">36</strong>
                </div>
                <div class="portal-legend-item">
                  <span class="portal-legend-dot is-inactive" aria-hidden="true"></span>
                  <div class="portal-legend-copy">
                    <strong>Tidak aktif</strong>
                    <small>14,3% dari total</small>
                  </div>
                  <strong class="portal-legend-value">6</strong>
                </div>
              </div>
            </div>
          </article>

          <article class="portal-panel portal-activity-panel">
            <header class="portal-panel-heading">
              <div>
                <h2>Aktivitas Terbaru</h2>
                <p>Perubahan data terakhir</p>
              </div>
            </header>

            <ul class="portal-activity-list">
              <li class="portal-activity-item">
                <span class="portal-activity-icon" aria-hidden="true">
                  <svg class="portal-icon" viewBox="0 0 24 24">
                    <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                    <path d="M9 4V2.8h6V4M9 10h6M9 14h6"></path>
                  </svg>
                </span>
                <span class="portal-activity-copy">
                  <strong>Pendaftar baru</strong>
                  <small>Ayu Lestari mengisi formulir pendaftaran</small>
                </span>
                <time datetime="PT2H">2 jam lalu</time>
              </li>
              <li class="portal-activity-item">
                <span class="portal-activity-icon" aria-hidden="true">
                  <svg class="portal-icon" viewBox="0 0 24 24">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="M3 9h18M16 14h2"></path>
                  </svg>
                </span>
                <span class="portal-activity-copy">
                  <strong>Pembayaran kas dicatat</strong>
                  <small>Dimas Saputra, periode Oktober 2026</small>
                </span>
                <time datetime="P1D">Kemarin</time>
              </li>
              <li class="portal-activity-item">
                <span class="portal-activity-icon" aria-hidden="true">
                  <svg class="portal-icon" viewBox="0 0 24 24">
                    <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                    <circle cx="9.5" cy="7" r="3.5"></circle>
                    <path d="M16 11a3.5 3.5 0 0 0 0-7M17 14.5a4 4 0 0 1 4 4V20"></path>
                  </svg>
                </span>
                <span class="portal-activity-copy">
                  <strong>Data anggota diperbarui</strong>
                  <small>Rina Wulandari diubah menjadi tidak aktif</small>
                </span>
                <time datetime="P2D">2 hari lalu</time>
              </li>
            </ul>
          </article>
        </section>

        <section class="portal-quick-section" aria-labelledby="portal-quick-title">
          <h2 id="portal-quick-title">Akses Cepat</h2>
          <div class="portal-quick-grid">
            <a class="portal-quick-card" href="#data-anggota">
              <span class="portal-quick-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                  <circle cx="9.5" cy="7" r="3.5"></circle>
                  <path d="M16 11a3.5 3.5 0 0 0 0-7M17 14.5a4 4 0 0 1 4 4V20"></path>
                </svg>
              </span>
              <span class="portal-quick-copy">
                <strong>Data Anggota</strong>
                <small>Kelola data dan status anggota</small>
              </span>
              <span class="portal-quick-arrow" aria-hidden="true">→</span>
            </a>

            <a class="portal-quick-card" href="#pendaftaran">
              <span class="portal-quick-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                  <path d="M9 4V2.8h6V4M9 10h6M9 14h6M9 18h3"></path>
                </svg>
              </span>
              <span class="portal-quick-copy">
                <strong>Pendaftaran</strong>
                <small>Lihat data calon anggota</small>
              </span>
              <span class="portal-quick-arrow" aria-hidden="true">→</span>
            </a>

            <a class="portal-quick-card" href="#kas">
              <span class="portal-quick-icon" aria-hidden="true">
                <svg class="portal-icon" viewBox="0 0 24 24">
                  <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                  <path d="M3 9h18M16 14h2"></path>
                </svg>
              </span>
              <span class="portal-quick-copy">
                <strong>Kas</strong>
                <small>Catat dan pantau pembayaran</small>
              </span>
              <span class="portal-quick-arrow" aria-hidden="true">→</span>
            </a>
          </div>
        </section>
      </div>
    </main>
  </div>
</body>

</html>