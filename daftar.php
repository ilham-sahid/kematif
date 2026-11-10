<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#f5fafc" />
	<meta
		name="description"
		content="Daftar menjadi anggota KEMATIF secara online. Lengkapi data diri dan alasan bergabung untuk ditinjau pengurus Keluarga Mahasiswa Teknik Informatika." />
	<meta name="robots" content="index, follow" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:title" content="Pendaftaran Anggota KEMATIF" />
	<meta
		property="og:description"
		content="Bergabung bersama KEMATIF, Keluarga Mahasiswa Teknik Informatika Politeknik Negeri Jember." />
	<title>Pendaftaran Anggota KEMATIF | Bergabung Bersama Keluarga</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="styles.css" />
</head>

<body class="auth-page registration-page">
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

	<main class="auth-main register-layout container" id="konten-utama">
		<section
			class="auth-intro register-intro"
			aria-labelledby="register-welcome-title">
			<span class="eyebrow-pill"><span class="eyebrow-dot" aria-hidden="true"></span> Pendaftaran
				anggota baru</span>
			<h1 class="auth-title" id="register-welcome-title">
				Bergabung bersama<br /><span>KEMATIF</span>
			</h1>
			<p class="auth-description">
				Daftar secara online lewat formulir ini. Lengkapi data diri tanpa
				perlu mengisi secara manual agar pengurus dapat meninjau
				pendaftaranmu.
			</p>

			<ol class="register-step-list">
				<li class="register-step-card">
					<span class="register-step-number">1</span><span><strong>Isi formulir pendaftaran</strong><small>Lengkapi nama, NIM, program studi, kontak, dan alasan
							bergabung.</small></span>
				</li>
				<li class="register-step-card">
					<span class="register-step-number">2</span><span><strong>Data siap ditinjau</strong><small>Setelah dikirim melalui sistem pendaftaran, data dapat ditinjau
							oleh pengurus.</small></span>
				</li>
				<li class="register-step-card">
					<span class="register-step-number">3</span><span><strong>Pengurus menindaklanjuti</strong><small>Pengurus meninjau data calon anggota yang telah
							mendaftar.</small></span>
				</li>
			</ol>

			<p class="privacy-note">
				<svg viewBox="0 0 24 24" aria-hidden="true">
					<path d="m12 3 8 4v5c0 4.5-3.2 7.7-8 9-4.8-1.3-8-4.5-8-9V7l8-4Z" />
					<path d="m8.5 12 2.2 2.2 4.8-5" />
				</svg>Data pendaftaran hanya dapat dilihat oleh pengurus KEMATIF.
			</p>
		</section>

		<section
			class="auth-form-wrap register-form-wrap"
			aria-labelledby="register-form-title">
			<form
				class="auth-form-card registration-form"
				action="#"
				method="post"
				id="registration-form">
				<header class="registration-form-header">
					<div>
						<h2 id="register-form-title">
							Formulir Pendaftaran Anggota KEMATIF
						</h2>
						<p>
							Kolom bertanda <span class="required-mark">*</span> wajib diisi
						</p>
					</div>
					<div class="completion-meter" aria-live="polite">
						<div class="completion-label">
							<span>Kelengkapan data</span><strong><output id="completion-count">0 / 6</output></strong>
						</div>
						<div
							class="progress-track"
							role="progressbar"
							aria-label="Kelengkapan data pendaftaran"
							aria-valuemin="0"
							aria-valuemax="6"
							aria-valuenow="0"
							id="completion-progress">
							<span id="completion-bar"></span>
						</div>
					</div>
				</header>

				<div class="registration-form-body">
					<fieldset class="form-section">
						<legend>Data diri</legend>
						<div class="registration-fields-grid">
							<div class="form-field">
								<label for="register-name">Nama Lengkap <span class="required-mark">*</span></label>
								<div class="input-shell">
									<svg
										class="field-icon"
										viewBox="0 0 24 24"
										aria-hidden="true">
										<circle cx="12" cy="8" r="3.5" />
										<path d="M4.5 20v-1.5a7.5 7.5 0 0 1 15 0V20" />
									</svg><input
										class="form-control has-leading-icon"
										type="text"
										id="register-name"
										name="nama"
										placeholder="Masukkan nama lengkap"
										autocomplete="name"
										required />
								</div>
							</div>
							<div class="form-field">
								<label for="register-nim">NIM <span class="required-mark">*</span></label>
								<div class="input-shell">
									<svg
										class="field-icon"
										viewBox="0 0 24 24"
										aria-hidden="true">
										<rect x="3.5" y="5" width="17" height="14" rx="2" />
										<circle cx="9" cy="10" r="2" />
										<path
											d="M6.5 15c.7-1.5 4.3-1.5 5 0M14 10h4M14 14h4" />
									</svg><input
										class="form-control has-leading-icon"
										type="text"
										id="register-nim"
										name="nim"
										placeholder="E41261xxx"
										autocomplete="off"
										required />
								</div>
							</div>
							<div class="form-field">
								<label for="register-prodi">Program Studi <span class="required-mark">*</span></label>
								<div class="input-shell">
									<svg
										class="field-icon"
										viewBox="0 0 24 24"
										aria-hidden="true">
										<path d="m2.5 8.5 9.5-5 9.5 5-9.5 5-9.5-5Z" />
										<path d="M6.5 11v5c3.5 3 7.5 3 11 0v-5M21.5 9v6" />
									</svg><input
										class="form-control has-leading-icon"
										type="text"
										id="register-prodi"
										name="prodi"
										placeholder="Masukkan program studi"
										required />
								</div>
							</div>
							<div class="form-field">
								<label for="register-contact">Email / No. HP <span class="required-mark">*</span></label>
								<div class="input-shell">
									<svg
										class="field-icon"
										viewBox="0 0 24 24"
										aria-hidden="true">
										<rect x="3" y="5" width="18" height="14" rx="2" />
										<path d="m4 7 8 6 8-6" />
									</svg><input
										class="form-control has-leading-icon"
										type="text"
										id="register-contact"
										name="kontak"
										placeholder="nama@email.com atau 08xxxxxxxxxx"
										autocomplete="email"
										required />
								</div>
								<small class="field-hint">Gunakan email aktif atau nomor yang diawali 08 / +62</small>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-section motivation-section">
						<legend>Motivasi</legend>
						<div class="form-field">
							<label for="register-reason">Alasan Bergabung <span class="required-mark">*</span></label>
							<textarea
								class="form-control reason-control"
								id="register-reason"
								name="alasan"
								rows="4"
								maxlength="300"
								minlength="1"
								placeholder="Ceritakan singkat alasanmu ingin bergabung dengan KEMATIF..."
								required></textarea>
							<div class="textarea-meta">
								<small>Tulis minimal satu kalimat</small><output id="reason-count">0 / 300</output>
							</div>
						</div>
					</fieldset>

					<label class="check-label consent-label"><input
							type="checkbox"
							name="persetujuan"
							id="register-consent"
							required /><span>Saya menyatakan bahwa data yang saya isi sudah benar.
							<span class="required-mark">*</span></span></label>
				</div>

				<footer class="registration-form-footer">
					<p>Setelah dikirim, kamu akan menerima konfirmasi</p>
					<div class="registration-actions">
						<button class="button button-secondary" type="reset">
							Kosongkan</button><button class="button button-primary" type="submit">
							Daftar / Kirim <span aria-hidden="true">→</span>
						</button>
					</div>
				</footer>
			</form>
		</section>
	</main>

	<footer class="auth-footer">
		<p>KEMATIF · Jurusan Teknologi Informasi · Politeknik Negeri Jember</p>
	</footer>

	<script>
		(() => {
			const form = document.querySelector("#registration-form");
			if (!form) return;

			const fields = [
				form.querySelector("#register-name"),
				form.querySelector("#register-nim"),
				form.querySelector("#register-prodi"),
				form.querySelector("#register-contact"),
				form.querySelector("#register-reason"),
				form.querySelector("#register-consent"),
			];
			const count = form.querySelector("#completion-count");
			const bar = form.querySelector("#completion-bar");
			const progress = form.querySelector("#completion-progress");
			const reason = form.querySelector("#register-reason");
			const reasonCount = form.querySelector("#reason-count");

			const updateProgress = () => {
				const completed = fields.filter((field) =>
					field.type === "checkbox" ?
					field.checked :
					field.value.trim().length > 0,
				).length;
				count.textContent = `${completed} / ${fields.length}`;
				bar.style.width = `${(completed / fields.length) * 100}%`;
				progress.setAttribute("aria-valuenow", String(completed));
			};
			const updateReasonCount = () => {
				reasonCount.textContent = `${reason.value.length} / 300`;
			};

			fields.forEach((field) =>
				field.addEventListener(
					field.type === "checkbox" ? "change" : "input",
					updateProgress,
				),
			);
			reason.addEventListener("input", updateReasonCount);
			form.addEventListener("reset", () =>
				requestAnimationFrame(() => {
					updateProgress();
					updateReasonCount();
				}),
			);
			updateProgress();
			updateReasonCount();
		})();
	</script>
</body>

</html>