{{-- resources/views/home/homepage.blade.php --}}
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>PentaWork</title>

  <style>
    /* RESET & BASE */
    * { box-sizing: border-box; }
    html,body { margin:0; padding:0; font-family: Inter, Arial, sans-serif; color:#111827; background:#f6f8fb; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; }
    img { max-width:100%; display:block; }
    a { color:inherit; text-decoration:none; }

    /* PREVENT HORIZONTAL SCROLL */
    html,body { overflow-x: hidden; }

    /* CONTAINER */
    .container { max-width:1200px; margin:0 auto; padding:0 24px; }

    /* NAVBAR */
    header.site-header { background: #fff; border-bottom: 1px solid #e6eefb; position:sticky; top:0; z-index:40; }
    .navbar { display:flex; align-items:center; justify-content:space-between; padding:18px 0; }
    .brand { font-size:28px; font-weight:700; color:#166dcc; letter-spacing:0.2px; }
    .nav-links { display:flex; align-items:center; gap:20px; }
    .nav-links a { color:#374151; font-weight:500; font-size:15px; padding:6px; }
    .auth-buttons { display:flex; gap:10px; align-items:center; }
    .btn { padding:8px 12px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; border:1px solid transparent; }
    .btn-signin { background:#fff; color:#166dcc; border:1px solid #cfe3ff; }
    .btn-signup { background:#166dcc; color:#fff; }

    /* HERO */
    .hero { background:#fff; margin-top:18px; padding:44px 0; border-radius:8px; box-shadow:0 6px 18px rgba(20,45,102,0.04); }
    .hero-grid { display:grid; grid-template-columns: 220px 1fr 360px; gap:28px; align-items:center; }
    /* stats left */
    .stats-list { display:flex; flex-direction:column; gap:16px; }
    .stat-card { background:#fff; padding:14px 16px; border-radius:12px; box-shadow:0 8px 20px rgba(15,35,75,0.06); display:flex; align-items:center; gap:12px; border-left:4px solid rgba(22,119,255,0.06); }
    .stat-card .num { font-weight:700; font-size:15px; }
    .stat-card .label { color:#6b7280; font-size:13px; }

    /* hero content center */
    .hero-content h1 { font-size:26px; margin:0 0 10px 0; line-height:1.15; }
    .hero-content h1 .accent { color:#166dcc; }
    .hero-content p.lead { color:#4b5563; margin:0 0 14px 0; }
    .features { display:flex; flex-direction:column; gap:10px; margin-top:6px; }
    .feature { display:flex; gap:12px; align-items:flex-start; color:#374151; }
    .feature .ico { width:28px; height:28px; display:inline-grid; place-items:center; border-radius:8px; background:#eef6ff; color:#166dcc; font-size:15px; }

    /* hero image right */
    .hero-illustration { display:flex; justify-content:center; align-items:center; }

    /* LOGOS */
    .sponsor-row { background:#fff; margin-top:22px; padding:16px 0; border-top:4px solid #1677ff; border-bottom:4px solid #1677ff; }
    .sponsor-list { display:flex; gap:28px; align-items:center; justify-content:center; flex-wrap:wrap; }

    /* ALUR */
    .alur { margin-top:28px; background:#f3f6f9; padding:40px 0; border-radius:8px; text-align:center; }
    .alur h2 { margin:0; font-weight:600; color:#374151; }
    .alur-steps { display:flex; justify-content:center; gap:24px; align-items:center; margin-top:26px; flex-wrap:wrap; }
    .step { width:160px; background:#fff; padding:18px; border-radius:12px; box-shadow:0 8px 20px rgba(15,35,75,0.04); }
    .step-title { margin-top:8px; font-size:14px; color:#374151; }

    /* KATEGORI */
    .kategori { margin-top:28px; padding:44px 0; text-align:center; }
    .kategori h2 { margin:0 0 20px 0; font-weight:600; color:#111827; }
    .categories { display:grid; grid-template-columns: repeat(4,1fr); gap:16px; max-width:1000px; margin:0 auto; }
    .cat { background:#fff; border-radius:10px; padding:14px; display:flex; gap:12px; align-items:center; box-shadow:0 8px 20px rgba(15,35,75,0.03); }
    .cat .icon { width:40px; height:40px; border-radius:8px; display:grid; place-items:center; background:#eef6ff; color:#166dcc; font-weight:700; }

    /* TESTIMONI */
    .testimoni { margin-top:28px; padding:44px 0; text-align:center; }
    .testi-grid { display:grid; grid-template-columns: repeat(3,1fr); gap:18px; max-width:1100px; margin:18px auto 0 auto; }
    .testi { background:#fff; padding:20px; border-radius:12px; box-shadow:0 8px 20px rgba(15,35,75,0.04); text-align:left; }
    .stars { color:#f59e0b; margin-bottom:10px; }
    .testi p { color:#374151; font-size:14px; }

    /* FOOTER */
    footer.site-footer { margin-top:40px; background:#0f1724; color:#e6eef8; padding:40px 0; }
    .footer-inner { display:flex; justify-content:space-between; gap:20px; align-items:flex-start; max-width:1200px; margin:0 auto; padding:0 24px; flex-wrap:wrap; }
    .footer-col { min-width:180px; }
    .footer-col h4 { color:#dbeafe; margin-bottom:10px; }
    .footer-col p, .footer-col a { color:#cbd5e1; font-size:13px; margin:6px 0; display:block; }

    /* RESPONSIVE */
    @media (max-width:1000px) {
      .hero-grid { grid-template-columns: 160px 1fr; }
      .hero-illustration { display:none; } /* hide large illustration on smaller screens */
      .categories { grid-template-columns: repeat(2,1fr); }
      .testi-grid { grid-template-columns: 1fr; }
    }
    @media (max-width:600px) {
      .container { padding:0 12px; }
      .navbar { padding:12px 0; }
      .brand { font-size:20px; }
      .nav-links { display:none; } /* simple mobile: hide nav links */
      .hero { padding:20px 0; }
      .hero-grid { grid-template-columns: 1fr; gap:12px; }
      .stats-list { flex-direction:row; gap:10px; overflow:auto; padding-bottom:6px; }
      .stat-card { min-width:140px; }
      .categories { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  {{-- NAVBAR --}}
  <header class="site-header">
    <div class="container navbar">
      <a href="/" class="brand" style="text-decoration:none;">PentaWork</a>

      <div class="auth-buttons">
        @if (Route::has('login'))
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-signin">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="btn btn-signin">Sign In</a>
          @if (Route::has('sign-as'))
            <a href="{{ route('sign-as') }}" class="btn btn-signup">Sign Up</a>
          @endif
          @endauth
        @endif
      </div>
    </div>
  </header>

  {{-- HERO --}}
  <main class="container">
    <section class="hero">
      <div class="hero-grid">
        {{-- LEFT: STATS --}}
        <div class="stats-list">
          <div class="stat-card"><div class="num">1,75,324</div><div class="label">Users</div></div>
          <div class="stat-card"><div class="num">38,47,154</div><div class="label">Total Projects</div></div>
          <div class="stat-card"><div class="num">7,532</div><div class="label">Freelancers</div></div>
          <div class="stat-card"><div class="num">97,354</div><div class="label">Companies</div></div>
        </div>

        {{-- CENTER: CONTENT --}}
        <div class="hero-content">
          <h1>Temukan pekerjaan impian Anda di <span class="accent"> <span style="color:#166dcc">PentaWork</span></span></h1>
          <p class="lead">Platform profesional untuk mencari pekerjaan, proyek, dan peluang baru.</p>

          <div class="features">
            <div class="feature"><div class="ico">🔒</div><div><strong>Keamanan pembayaran terjamin</strong><div style="color:#6b7280;font-size:13px">Transaksi aman & terproteksi</div></div></div>
            <div class="feature"><div class="ico">🎓</div><div><strong>Freelancer tersertifikasi</strong><div style="color:#6b7280;font-size:13px">Profil terverifikasi & portofolio nyata</div></div></div>
            <div class="feature"><div class="ico">💰</div><div><strong>Garansi uang kembali</strong><div style="color:#6b7280;font-size:13px">Jika pekerjaan tidak sesuai syarat</div></div></div>
          </div>
        </div>

        {{-- RIGHT: ILLUSTRATION --}}
        <div class="hero-illustration">
          {{-- Use your image placed in public/FE/images/hero.png --}}
          <img src="{{ asset('image/pekerja.jpg') }}" alt="Hero Image" width="340" style="border-radius:12px;">
        </div>
      </div>
    </section>

    {{-- SPONSOR LOGOS --}}
    <section class="sponsor-row">
      <div class="container sponsor-list">
        <img src="{{ asset('image/foto1.jpg') }}" alt="Djarum" style="height:44px; opacity:0.95;">
        <img src="{{ asset('image/foto2.jpg') }}" alt="Freeport" style="height:38px; opacity:0.95;">
        <img src="{{ asset('image/foto3.jpg') }}" alt="Wilmar" style="height:44px; opacity:0.95;">
        <img src="{{ asset('image/foto4.jpg') }}" alt="Grab" style="height:44px; opacity:0.95;">
        <img src="{{ asset('image/foto5.jpg') }}" alt="Gojek" style="height:44px; opacity:0.95;">
        <img src="{{ asset('image/foto6.jpg') }}" alt="SIG" style="height:36px; opacity:0.95;">
        <img src="{{ asset('image/foto7.jpg') }}" alt="Pertamina" style="height:44px; opacity:0.95;">
        <img src="{{ asset('image/foto8.jpg') }}" alt="Jipe" style="height:38px; opacity:0.95;">
      </div>
    </section>

    {{-- ALUR --}}
    <section class="alur">
      <h2>Alur Mendaftar Pekerjaan</h2>
      <div class="alur-steps">
        <div class="step">
          <div style="font-size:20px">👤</div>
          <div class="step-title">Create account</div>
        </div>
        <div style="width:36px; display:grid; place-items:center;">➜</div>
        <div class="step" style="transform:translateY(-6px);">
          <div style="font-size:20px">📄</div>
          <div class="step-title">Upload CV / Resume</div>
        </div>
        <div style="width:36px; display:grid; place-items:center;">➜</div>
        <div class="step">
          <div style="font-size:20px">🔍</div>
          <div class="step-title">Cari Pekerjaan</div>
        </div>
        <div style="width:36px; display:grid; place-items:center;">➜</div>
        <div class="step">
          <div style="font-size:20px">📌</div>
          <div class="step-title">Daftar kerja</div>
        </div>
      </div>
    </section>

    {{-- KATEGORI --}}
    <section class="kategori">
      <h2>Kategori TerPopuler</h2>
      <div class="categories">
        <div class="cat"><div class="icon">✏️</div><div>Desain Grafis</div></div>
        <div class="cat"><div class="icon">💻</div><div>Programming</div></div>
        <div class="cat"><div class="icon">📣</div><div>Digital Marketing</div></div>
        <div class="cat"><div class="icon">🎬</div><div>Video Kreator</div></div>
        <div class="cat"><div class="icon">🎵</div><div>Musik & Audio</div></div>
        <div class="cat"><div class="icon">📊</div><div>Akuntansi & Keuangan</div></div>
        <div class="cat"><div class="icon">🩺</div><div>Kesehatan</div></div>
        <div class="cat"><div class="icon">📈</div><div>Data & Analitik</div></div>
      </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="testimoni">
      <h2>Testimoni</h2>
      <div class="testi-grid">
        <div class="testi">
          <div class="stars">★★★★★</div>
          <p>"Prosesnya sangat cepat dan mudah. Job selesai hanya dalam 2 minggu."</p>
          <div style="margin-top:12px;font-weight:700">Satria</div>
        </div>
        <div class="testi">
          <div class="stars">★★★★★</div>
          <p>"Pendaftarannya mudah dan freelancernya terpercaya."</p>
          <div style="margin-top:12px;font-weight:700">Suwarna</div>
        </div>
        <div class="testi">
          <div class="stars">★★★★★</div>
          <p>"Sistemnya aman dan transparan, sangat direkomendasikan."</p>
          <div style="margin-top:12px;font-weight:700">Suranto</div>
        </div>
      </div>
    </section>
  </main>

  {{-- FOOTER --}}
  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-col">
        <h4>PentaWork</h4>
        <p>Proyek Pengembangan Perangkat Lunak</p>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Blog</a>
      </div>
      <div class="footer-col">
        <h4>Support</h4>
        <a href="#">Help Center</a>
        <a href="#">Privacy</a>
      </div>
      <div class="footer-col">
        <h4>© 2026 Kita Lulus</h4>
        <p style="font-size:12px;color:#94a3b8;margin-top:8px">All rights reserved</p>
      </div>
    </div>
  </footer>

</body>
</html>
