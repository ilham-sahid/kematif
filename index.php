<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#f7fbfd" />
	<meta
		name="description"
		content="KEMATIF adalah Keluarga Mahasiswa Program Studi Teknik Informatika Politeknik Negeri Jember. Terhubung, bertumbuh, dan berkontribusi bersama." />
	<meta name="robots" content="index, follow" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="id_ID" />
	<meta
		property="og:title"
		content="KEMATIF — Keluarga Mahasiswa Teknik Informatika" />
	<meta
		property="og:description"
		content="Ruang untuk terhubung, menyampaikan aspirasi, dan mengembangkan kompetensi mahasiswa Teknik Informatika." />
	<title>
		KEMATIF — Keluarga Mahasiswa Teknik Informatika | Politeknik Negeri Jember
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="styles.css" />
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"name": "KEMATIF",
			"alternateName": "Keluarga Mahasiswa Teknik Informatika",
			"description": "Organisasi mahasiswa Program Studi Teknik Informatika yang menghimpun mahasiswa aktif dan alumni.",
			"parentOrganization": {
				"@type": "CollegeOrUniversity",
				"name": "Politeknik Negeri Jember"
			}
		}
	</script>
</head>

<body class="home-page">
	<a class="skip-link" href="#konten-utama">Lewati ke konten utama</a>
	<header class="site-header home-header">
		<nav class="navbar home-navbar" aria-label="Navigasi utama">
			<a class="nav-logo" href="#beranda" aria-label="KEMATIF, beranda">
				<img
					src="logokematif.png"
					alt="Logo KEMATIF"
					width="120"
					height="70" />
			</a>
			<ul class="nav-links">
				<li><a href="#beranda" aria-current="page">Beranda</a></li>
				<li><a href="#tentang-kami">Tentang kami</a></li>
				<li><a href="#keanggotaan">Keanggotaan</a></li>
				<li><a href="#qna">Q&amp;A</a></li>
				<li><a href="#kontak">Kontak</a></li>
			</ul>
			<div class="nav-actions">
				<a class="button button-outline button-small" href="login.php">Login</a>
				<a class="button button-primary button-small" href="daftar.php">Daftar anggota <span aria-hidden="true">→</span></a>
			</div>
		</nav>
	</header>

	<main id="konten-utama">
		<section class="home-hero" id="beranda" aria-labelledby="hero-title">
			<div class="container">
				<div class="hero-grid">
					<div class="hero-copy reveal">
						<span class="eyebrow-pill"><span class="eyebrow-dot" aria-hidden="true"></span> Dashboard
							KEMATIF</span>
						<h1 class="home-hero-title" id="hero-title">
							“TEKNIK INFORMATIKA..<br /><span>KELUARGA SELAMANYA!”</span>
						</h1>
						<p class="lead-copy">
							Ruang untuk terhubung, menyampaikan aspirasi, dan mengembangkan
							kompetensi mahasiswa Teknik Informatika.
						</p>
						<div class="hero-actions">
							<a class="button button-primary" href="daftar.php">Bergabung sekarang <span aria-hidden="true">→</span></a>
							<a class="button button-outline" href="#tentang-kami">Kenali KEMATIF</a>
						</div>
					</div>

					<aside
						class="identity-card reveal"
						aria-label="Tentang keluarga KEMATIF">
						<img
							class="identity-logo"
							src="logokematif.png"
							alt="Logo KEMATIF"
							width="180"
							height="120" />
						<h2>Keluarga Mahasiswa<br />Teknik Informatika</h2>
						<p>
							Menghubungkan mahasiswa aktif dan alumni dalam satu keluarga.
						</p>
						<div class="tag-list" aria-label="Anggota KEMATIF">
							<span class="soft-tag">Mahasiswa aktif</span>
							<span class="soft-tag">Alumni</span>
						</div>
					</aside>
				</div>

				<nav class="feature-grid" aria-label="Akses cepat">
					<a class="feature-card" href="#tentang-kami">
						<span class="feature-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24">
								<path d="M6 4.75h12v14.5H6zM9 8h6M9 11.5h6M9 15h3" />
							</svg>
						</span>
						<span class="feature-content"><strong>Tentang KEMATIF</strong><small>Kenali keluarga, tujuan, dan peran organisasi.</small></span>
						<span class="feature-arrow" aria-hidden="true">→</span>
					</a>
					<a class="feature-card" href="daftar.php">
						<span class="feature-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24">
								<path d="M5 4.75h14v14.5H5zM9 8h6M9 12h6M9 16h3" />
							</svg>
						</span>
						<span class="feature-content"><strong>Pendaftaran anggota</strong><small>Mulai langkahmu menjadi bagian dari KEMATIF.</small></span>
						<span class="feature-arrow" aria-hidden="true">→</span>
					</a>
					<a class="feature-card" href="login.php">
						<span class="feature-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24">
								<path d="M13 5h6v14h-6M5 12h10m-4-4 4 4-4 4" />
							</svg>
						</span>
						<span class="feature-content"><strong>Portal anggota</strong><small>Akses informasi keanggotaan dan status kas.</small></span>
						<span class="feature-arrow" aria-hidden="true">→</span>
					</a>
				</nav>
			</div>
		</section>

		<section
			class="section about-section"
			id="tentang-kami"
			aria-labelledby="about-title">
			<div class="container about-grid">
				<header class="section-heading">
					<span class="section-kicker">Tentang kami</span>
					<h2 class="section-title" id="about-title">
						Lebih dari organisasi,<br />sebuah keluarga.
					</h2>
				</header>
				<div class="about-copy">
					<p>
						Keluarga Mahasiswa Program Studi Teknik Informatika adalah ikatan
						yang menghimpun seluruh mahasiswa Program Studi Teknik
						Informatika, yang terdiri dari mahasiswa aktif dan alumni.
						Organisasi ini berada dalam naungan Keluarga Mahasiswa Jurusan
						Teknologi Informasi Politeknik Negeri Jember.
					</p>
					<div class="institution-note">
						<svg viewBox="0 0 24 24" aria-hidden="true">
							<path
								d="m12 3 8 4v5c0 4.5-3.2 7.7-8 9-4.8-1.3-8-4.5-8-9V7l8-4Z" />
							<path d="m8.5 12 2.2 2.2 4.8-5" />
						</svg>
						<span>Jurusan Teknologi Informasi · Politeknik Negeri Jember</span>
					</div>
				</div>
			</div>
		</section>

		<section
			class="section membership-section"
			id="keanggotaan"
			aria-labelledby="membership-title">
			<div class="container membership-grid">
				<div class="membership-copy">
					<span class="section-kicker">Keanggotaan</span>
					<h2 class="section-title" id="membership-title">
						Mulai perjalananmu<br />bersama KEMATIF.
					</h2>
					<p>
						Isi formulir pendaftaran dan lengkapi data dirimu. Pengurus akan
						meninjau pendaftaran yang masuk.
					</p>
					<a class="button button-primary" href="daftar.php">Daftar anggota <span aria-hidden="true">→</span></a>
				</div>
				<ol class="membership-steps">
					<li class="membership-step">
						<span class="step-index">01</span>
						<div>
							<h3>Isi formulir pendaftaran</h3>
							<p>
								Lengkapi nama, NIM, program studi, kontak, dan alasan
								bergabung.
							</p>
						</div>
					</li>
					<li class="membership-step">
						<span class="step-index">02</span>
						<div>
							<h3>Pengurus meninjau data</h3>
							<p>
								Data pendaftaran diteruskan kepada pengurus untuk ditinjau.
							</p>
						</div>
					</li>
					<li class="membership-step">
						<span class="step-index">03</span>
						<div>
							<h3>Terima konfirmasi keanggotaan</h3>
							<p>
								Setelah disetujui, gunakan akun yang diberikan pengurus untuk
								login.
							</p>
						</div>
					</li>
				</ol>
			</div>
		</section>

		<section class="section faq-section" id="qna" aria-labelledby="faq-title">
			<div class="container">
				<header class="section-intro">
					<span class="section-kicker">Q&amp;A</span>
					<h2 class="section-title" id="faq-title">
						Pertanyaan yang sering ditanyakan.
					</h2>
					<p>Kenali KEMATIF dan temukan informasi sebelum bergabung.</p>
				</header>
				<div class="faq-grid">
					<article class="faq-card">
						<h3>Apa itu KEMATIF?</h3>
						<p>
							KEMATIF adalah Keluarga Mahasiswa Program Studi Teknik
							Informatika yang menghimpun mahasiswa aktif dan alumni.
						</p>
					</article>
					<article class="faq-card">
						<h3>Siapa yang menjadi bagian dari KEMATIF?</h3>
						<p>
							Keluarga KEMATIF terdiri dari mahasiswa aktif dan alumni Program
							Studi Teknik Informatika.
						</p>
					</article>
					<article class="faq-card">
						<h3>Bagaimana cara mendaftar sebagai anggota?</h3>
						<p>
							Buka menu Pendaftaran, lengkapi data diri dan alasan bergabung,
							lalu kirim formulir untuk ditinjau pengurus.
						</p>
					</article>
					<article class="faq-card">
						<h3>Apa yang terjadi setelah saya mendaftar?</h3>
						<p>
							Pengurus akan meninjau data pendaftaran. Setelah disetujui, kamu
							akan menerima informasi keanggotaan dan akun login.
						</p>
					</article>
					<article class="faq-card">
						<h3>Bagaimana cara masuk ke portal anggota?</h3>
						<p>
							Pilih Login, gunakan NIM sebagai username dan kata sandi yang
							diberikan pengurus KEMATIF.
						</p>
					</article>
					<article class="faq-card">
						<h3>Bagaimana jika saya kesulitan login?</h3>
						<p>
							Hubungi pengurus KEMATIF untuk bantuan akses akun. Kamu juga
							dapat menyampaikan pertanyaan melalui bagian Kontak.
						</p>
					</article>
				</div>
			</div>
		</section>

		<section
			class="section contact-section"
			id="kontak"
			aria-labelledby="contact-title">
			<div class="container contact-grid">
				<div class="contact-copy">
					<span class="section-kicker">Kontak</span>
					<h2 class="section-title" id="contact-title">Mari terhubung.</h2>
					<p>
						Punya pertanyaan, masukan, atau aspirasi? Sampaikan kepada
						pengurus KEMATIF.
					</p>
					<ul class="contact-details">
						<li>
							<span class="contact-icon" aria-hidden="true"><svg viewBox="0 0 24 24">
									<path
										d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20M9.5 10.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM17 11h4m-2-2v4" />
								</svg></span>
							<span><strong>Pengurus KEMATIF</strong><small>Informasi keanggotaan, pendaftaran, dan bantuan akses
									akun.</small></span>
						</li>
						<li>
							<span class="contact-icon" aria-hidden="true"><svg viewBox="0 0 24 24">
									<path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z" />
									<circle cx="12" cy="10" r="2.3" />
								</svg></span>
							<span><strong>Lingkungan organisasi</strong><small>Jurusan Teknologi Informasi<br />Politeknik Negeri
									Jember</small></span>
						</li>
					</ul>
				</div>

				<form
					class="contact-form"
					action="#"
					method="post"
					aria-labelledby="contact-form-title">
					<h3 id="contact-form-title">Kirim pertanyaan atau aspirasi</h3>
					<div class="form-row">
						<div class="form-field">
							<label for="contact-name">Nama lengkap</label><input
								class="form-control"
								type="text"
								id="contact-name"
								name="nama_lengkap"
								autocomplete="name"
								placeholder="Masukkan nama lengkap"
								required />
						</div>
						<div class="form-field">
							<label for="contact-email">Email</label><input
								class="form-control"
								type="email"
								id="contact-email"
								name="email"
								autocomplete="email"
								placeholder="nama@email.com"
								required />
						</div>
					</div>
					<div class="form-field">
						<label for="contact-topic">Topik</label><input
							class="form-control"
							type="text"
							id="contact-topic"
							name="topik"
							placeholder="Contoh: Pendaftaran atau bantuan akun" />
					</div>
					<div class="form-field">
						<label for="contact-message">Pesan</label><textarea
							class="form-control"
							id="contact-message"
							name="pesan"
							rows="4"
							placeholder="Tuliskan pertanyaan atau aspirasi kamu di sini..."
							required></textarea>
					</div>
					<div class="contact-form-footer">
						<small>Jangan sertakan kata sandi atau informasi sensitif.</small><button class="button button-primary" type="submit">
							Kirim pesan <span aria-hidden="true">→</span>
						</button>
					</div>
				</form>
			</div>
		</section>
	</main>

	<footer class="site-footer home-footer">
		<div class="container footer-main">
			<div class="footer-brand">
				<a
					class="nav-logo"
					href="#beranda"
					aria-label="Kembali ke beranda KEMATIF"><img
						src="logokematif.png"
						alt="Logo KEMATIF"
						width="120"
						height="70" /></a>
				<p>
					Keluarga Mahasiswa Program Studi Teknik Informatika.<br />Teknik
					Informatika, keluarga selamanya.
				</p>
			</div>
			<nav class="footer-nav" aria-label="Jelajahi">
				<h2>Jelajahi</h2>
				<a href="#tentang-kami">Tentang kami</a><a href="#keanggotaan">Keanggotaan</a><a href="#qna">Pertanyaan &amp; jawaban</a>
			</nav>
			<nav class="footer-nav" aria-label="Akses dan bantuan">
				<h2>Akses &amp; bantuan</h2>
				<a href="daftar.php">Pendaftaran</a><a href="login.php">Login anggota</a><a href="#kontak">Hubungi pengurus</a>
			</nav>
		</div>
		<div class="container footer-bottom">
			<small>KEMATIF · Jurusan Teknologi Informasi · Politeknik Negeri
				Jember</small><a href="#beranda">Dashboard KEMATIF</a>
		</div>
	</footer>
</body>

</html>