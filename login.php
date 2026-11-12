<?php
session_start();
include_once "config/helper.php";

if (isLoggedIn()) {
	redirectTo($_SESSION['user']['role'] . "/index");
}

extract(getSessionByKey(['errors', 'old']));
unsetSession(['errors', 'old']);
?>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#f5fafc" />
	<meta
		name="description"
		content="Login portal anggota KEMATIF. Masuk menggunakan NIM dan kata sandi yang diberikan oleh pengurus untuk mengakses informasi keanggotaan." />
	<meta name="robots" content="index, follow" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:title" content="Login Anggota KEMATIF" />
	<meta
		property="og:description"
		content="Masuk ke portal anggota KEMATIF menggunakan akun yang diberikan pengurus." />
	<title>Login Anggota KEMATIF | Portal Keanggotaan</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="styles.css?v=3" />
</head>

<body class="auth-page">
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
				<li>
					<a href="index.php#beranda" aria-current="page">Beranda</a>
				</li>
				<li><a href="index.php#tentang-kami">Tentang kami</a></li>
				<li><a href="index.php#keanggotaan">Keanggotaan</a></li>
				<li><a href="index.php#qna">Q&amp;A</a></li>
				<li><a href="index.php#kontak">Kontak</a></li>
			</ul>
			<div class="nav-actions">
				<a class="button button-outline button-small" href="login.php">Login</a>
				<a class="button button-primary button-small" href="daftar.php">Daftar anggota <span aria-hidden="true">→</span></a>
			</div>
		</nav>
	</header>

	<main class="auth-main login-layout container" id="konten-utama">
		<section class="auth-intro" aria-labelledby="login-welcome-title">
			<span class="eyebrow-pill"><span class="eyebrow-dot" aria-hidden="true"></span> Sistem informasi
				KEMATIF</span>
			<h1 class="auth-title" id="login-welcome-title">
				Selamat datang di<br />KEMATIF
			</h1>
			<p class="auth-description">
				Masuk untuk mengakses informasi keanggotaan dan mengelola aktivitas
				organisasi sesuai peranmu.
			</p>

			<ul class="info-card-list">
				<li class="info-card">
					<span class="info-icon" aria-hidden="true"><svg viewBox="0 0 24 24">
							<path
								d="M19 20v-1.5a4.5 4.5 0 0 0-4.5-4.5h-5A4.5 4.5 0 0 0 5 18.5V20M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
						</svg></span>
					<span><strong>Informasi keanggotaan</strong><small>Akses data dan status keanggotaanmu dalam satu tempat.</small></span>
				</li>
				<li class="info-card">
					<span class="info-icon" aria-hidden="true"><svg viewBox="0 0 24 24">
							<path
								d="M4 6.5h14a2 2 0 0 1 2 2V19H6a2 2 0 0 1-2-2V6.5Zm0 0V5a2 2 0 0 1 2-2h12M16 13h4m-4 0a2 2 0 1 0 0 4h4v-4h-4Z" />
						</svg></span>
					<span><strong>Status dan transparansi kas</strong><small>Pantau status pembayaran dan riwayat kas organisasi.</small></span>
				</li>
				<li class="info-card">
					<span class="info-icon" aria-hidden="true"><svg viewBox="0 0 24 24">
							<rect x="4" y="4" width="6" height="6" rx="1" />
							<rect x="14" y="4" width="6" height="6" rx="1" />
							<rect x="4" y="14" width="6" height="6" rx="1" />
							<rect x="14" y="14" width="6" height="6" rx="1" />
						</svg></span>
					<span><strong>Akses sesuai peran</strong><small>Ruang kerja untuk anggota, pengurus, dan bendahara
							KEMATIF.</small></span>
				</li>
			</ul>

			<p class="privacy-note">
				<svg viewBox="0 0 24 24" aria-hidden="true">
					<path d="m12 3 8 4v5c0 4.5-3.2 7.7-8 9-4.8-1.3-8-4.5-8-9V7l8-4Z" />
					<path d="m8.5 12 2.2 2.2 4.8-5" />
				</svg>Jaga kerahasiaan akun dan kata sandimu.
			</p>
		</section>

		<section class="auth-form-wrap" aria-labelledby="login-form-title">
			<form
				class="auth-form-card login-form"
				action="auth/login.php"
				method="post">
				<header class="form-card-header">
					<h2 id="login-form-title">Login ke KEMATIF</h2>
					<p>Gunakan akun yang telah diberikan oleh pengurus.</p>
				</header>
				<div class="form-card-body">
					<?php
					if ($errors) {
					?>
						<div class="form-error-summary">
							<span class="summary-error-icon" aria-hidden="true">!</span>

							<?php
							if ($errors['username'] || $errors['password']) {
							?>
								<div>
									<strong>Data belum lengkap</strong>
									<p>Lengkapi kolom yang wajib diisi sebelum menyimpan.</p>
								</div>
							<?php
							} else {
							?>
								<div>
									<strong>Data tidak valid</strong>
									<p><?= $errors[0] ?></p>
								</div>
							<?php
							}
							?>
						</div>
					<?php
					}
					?>
					<div class="form-field">
						<label for="login-nim">NIM <span class="required-mark">*</span></label>
						<div class="input-shell">
							<svg class="field-icon" viewBox="0 0 24 24" aria-hidden="true">
								<rect x="3.5" y="5" width="17" height="14" rx="2" />
								<circle cx="9" cy="10" r="2" />
								<path d="M6.5 15c.7-1.5 4.3-1.5 5 0M14 10h4M14 14h4" />
							</svg>
							<input
								class="form-control <?= $errors['username'] ? 'is-error' : '' ?> has-leading-icon"
								type="text"
								id="login-nim"
								name="username"
								placeholder="Masukkan NIM"
								value="<?= htmlspecialchars($old['username'] ?? '') ?>"
								autocomplete="username" />
						</div>
						<?= showErrorMessage($errors['username'] ?? null, '<small class="field-hint">Gunakan NIM sebagai username akunmu.</small>') ?>
					</div>

					<div class="form-field">
						<label for="login-password">Kata Sandi <span class="required-mark">*</span></label>
						<div class="input-shell">
							<svg class="field-icon" viewBox="0 0 24 24" aria-hidden="true">
								<rect x="4.5" y="10" width="15" height="11" rx="2" />
								<path d="M8 10V7a4 4 0 1 1 8 0v3M12 14v3" />
							</svg>
							<input
								class="form-control <?= $errors['password'] ? 'is-error' : '' ?> has-leading-icon has-trailing-control"
								type="password"
								id="login-password"
								name="password"
								placeholder="Masukkan kata sandi"
								value="<?= htmlspecialchars($old['password'] ?? '') ?>"
								autocomplete="current-password" />
							<button
								class="password-toggle"
								type="button"
								aria-label="Tampilkan kata sandi"
								aria-pressed="false"
								aria-controls="login-password">
								<svg viewBox="0 0 24 24" aria-hidden="true">
									<path
										d="M2.5 12s3.2-6 9.5-6 9.5 6 9.5 6-3.2 6-9.5 6-9.5-6-9.5-6Z" />
									<circle cx="12" cy="12" r="2.6" />
								</svg>
							</button>
						</div>
						<?= showErrorMessage($errors['password'] ?? null, '') ?>
					</div>

					<div class="login-options">
						<label class="check-label"><input type="checkbox" name="remember" />
							<span>Ingat saya</span></label>
						<a class="text-link" href="index.html#kontak">Lupa kata sandi?</a>
					</div>

					<button class="button button-primary button-submit" type="submit">
						Masuk <span aria-hidden="true">→</span>
					</button>

					<aside class="notice-box" aria-label="Informasi login pertama">
						<svg viewBox="0 0 24 24" aria-hidden="true">
							<circle cx="12" cy="12" r="9" />
							<path d="M12 10.5v5M12 7.5h.01" />
						</svg>
						<p>
							Pertama kali login? Gunakan kata sandi awal yang disampaikan
							oleh pengurus KEMATIF.
						</p>
					</aside>
				</div>
				<footer class="form-card-footer">
					<p>
						Belum menjadi anggota?
						<a class="text-link" href="daftar.php">Daftar sekarang</a>
					</p>
				</footer>
			</form>
			<p class="form-support-note">
				Kesulitan login? Hubungi pengurus KEMATIF.
			</p>
		</section>
	</main>

	<footer class="auth-footer">
		<p>KEMATIF · Jurusan Teknologi Informasi · Politeknik Negeri Jember</p>
	</footer>

	<script>
		(() => {
			const toggle = document.querySelector(".password-toggle");
			const password = document.querySelector("#login-password");
			if (!toggle || !password) return;

			toggle.addEventListener("click", () => {
				const isVisible = password.type === "text";
				password.type = isVisible ? "password" : "text";
				toggle.setAttribute("aria-pressed", String(!isVisible));
				toggle.setAttribute(
					"aria-label",
					isVisible ? "Tampilkan kata sandi" : "Sembunyikan kata sandi",
				);
			});
		})();
	</script>
</body>

</html>