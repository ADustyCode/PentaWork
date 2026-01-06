<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>PentaWork Dashboard</title>

  <style>
    * { box-sizing: border-box; }
    html,body { margin:0; padding:0; font-family: Inter, Arial, sans-serif; color:#111827; background:#f6f8fb; overflow-x:hidden; }
    img { max-width:100%; display:block; }
    a { color:inherit; text-decoration:none; }

    .container { max-width:1200px; margin:0 auto; padding:0 24px; }

    /* NAVBAR */
    header.site-header { background:#fff; border-bottom:1px solid #e6eefb; position:sticky; top:0; z-index:40; }
    .navbar { display:flex; align-items:center; justify-content:space-between; padding:18px 0; }
    .brand { font-size:28px; font-weight:700; color:#166dcc; }
    .nav-center { display:flex; gap:20px; font-weight:500; }

    /* PROFILE */
    .profile-area { display:flex; align-items:center; gap:14px; cursor:pointer; }
    .profile-img { width:42px; height:42px; border-radius:50%; object-fit:cover; }

    /* HERO */
    .hero { background:#fff; margin-top:18px; padding:44px 0; border-radius:8px; box-shadow:0 6px 18px rgba(20,45,102,0.04); }
    .hero-grid { display:grid; grid-template-columns: 220px 1fr 360px; gap:28px; align-items:center; }
    .stats-list { display:flex; flex-direction:column; gap:16px; }
    .stat-card { background:#fff; padding:14px 16px; border-radius:12px; box-shadow:0 8px 20px rgba(15,35,75,0.06); display:flex; gap:12px; align-items:center; }
    .num { font-weight:700; }
    .label { font-size:13px; color:#6b7280; }

    .hero-content h1 { font-size:26px; margin-bottom:10px; }
    .accent { color:#166dcc; }
    .hero-content p { color:#4b5563; }

    .features { margin-top:10px; display:flex; flex-direction:column; gap:10px; }
    .feature { display:flex; gap:10px; align-items:flex-start; }
    .ico { width:28px; height:28px; border-radius:8px; background:#eef6ff; display:grid; place-items:center; color:#166dcc; font-weight:600; }

    .hero-illustration { display:flex; justify-content:center; }

    .kategori { margin-top:28px; padding:44px 0; text-align:center; }
    .kategori h2 { margin:0 0 20px 0; font-weight:600; color:#111827; }
    .categories { display:grid; grid-template-columns: repeat(4,1fr); gap:16px; max-width:1000px; margin:0 auto; }
    .cat { background:#fff; border-radius:10px; padding:14px; display:flex; gap:12px; align-items:center; box-shadow:0 8px 20px rgba(15,35,75,0.03); }
    .cat .icon { width:40px; height:40px; border-radius:8px; display:grid; place-items:center; background:#eef6ff; color:#166dcc; font-weight:700; }

    /* LOGOS */
    .sponsor-row { background:#fff; margin-top:22px; padding:16px 0; border-top:4px solid #1677ff; border-bottom:4px solid #1677ff; }
    .sponsor-list { display:flex; justify-content:center; gap:28px; flex-wrap:wrap; }

    /* RESPONSIVE */
    @media(max-width:1000px){ .hero-grid { grid-template-columns:160px 1fr; } .hero-illustration{display:none;} }
    @media(max-width:600px){ .hero-grid{grid-template-columns:1fr;} }
  </style>
</head>
<body>

<header class="site-header">
  <div class="container">
    <div class="navbar">
      <div class="brand">PentaWork</div>

      <nav class="nav-center">
        <a href="/dashboard">Dashboard</a>
        <a href="/jobboard">Jobboard</a>
      </nav>

      <div class="profile-area">
        <img src="image/vinsen.jpg" class="profile-img" alt="Profile">
      </div>
    </div>
  </div>
</header>

<section class="hero container">
  <div class="hero-grid">

    <div class="stats-list">
      <div class="stat-card"><div><div class="num">1,75,324</div><div class="label">Users</div></div></div>
      <div class="stat-card"><div><div class="num">38,471,154</div><div class="label">Projects</div></div></div>
      <div class="stat-card"><div><div class="num">7,532</div><div class="label">Freelancers</div></div></div>
      <div class="stat-card"><div><div class="num">87,354</div><div class="label">Organizations</div></div></div>
    </div>

    <div class="hero-content">
      <h1>Selamat datang di <span class="accent">PentaWork</span></h1>
      <p>Temukan pekerjaan, kelola proyek, dan akses fitur eksklusif Anda.</p>

      <div class="features">
        <div class="feature"><div class="ico">✔</div> Akses lowongan kerja terbaru</div>
        <div class="feature"><div class="ico">✔</div> Kelola profil profesional Anda</div>
        <div class="feature"><div class="ico">✔</div> Koneksi langsung ke perusahaan</div>
      </div>
    </div>

    <div class="hero-illustration">
      <img src="image/pekerja.jpg" alt="Hero Illustration" />
    </div>

  </div>
</section>

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

</body>
</html>
