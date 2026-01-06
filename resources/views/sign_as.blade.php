<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PentaWork</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- [web:17] -->
    <style>
      body {
        font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        background-color: #e6f0ff;
        min-height: 100vh;
      }
      .brand {
        font-size: 32px;
        font-weight: 600;
        padding: 24px 64px;
      }
      .brand span:first-child { color: #2f6ee5; }
      .brand span:last-child  { color: #1b3f8b; }

      .hero-wrapper {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 40px;
      }
      .hero-title {
        font-size: 32px;
        font-weight: 500;
        line-height: 1.3;
      }
      .hero-title span {
        color: #2f6ee5;
        font-weight: 700;
      }
      .hero-sub {
        font-size: 24px;
        margin-top: 4px;
      }

      .cards-row {
        max-width: 900px;
        margin: 40px auto 80px auto;
      }
      .card-custom {
        border-radius: 12px;
        padding: 32px 28px;
        border: none;
        height: 100%;
      }
      .card-left {
        background-color: #f4f5f9;
        color: #1a1a1a;
      }
      .card-right {
        background-color: #0052cc;
        color: #ffffff;
      }
      .card-title {
        font-weight: 600;
        margin-bottom: 12px;
      }
      .btn-ghost-light,
      .btn-ghost-dark {
        border-radius: 999px;
        padding: 8px 22px;
        font-size: 14px;
        font-weight: 500;
      }
      .btn-ghost-light {
        background-color: #ffffff;
        color: #0052cc;
        border: none;
      }
      .btn-ghost-dark {
        background-color: #0052cc;
        color: #ffffff;
        border: 1px solid #ffffff;
      }
      .btn-ghost-light:hover {
        background-color: #e6ecff;
      }
      .btn-ghost-dark:hover {
        background-color: #003c99;
      }

      @media (max-width: 767.98px) {
        .brand { padding: 16px 20px; font-size: 26px; }
        .hero-title { font-size: 24px; }
        .hero-sub   { font-size: 18px; }
        .cards-row { padding: 0 16px; }
      }
    </style>
  </head>
  <body>
    <!-- Logo / Brand -->
    <div class="brand">
      <span>Penta</span><span>Work</span>
    </div>

    <!-- Hero Section -->
    <section class="hero-wrapper">
      <h1 class="hero-title">
        Pekerjakan profesional melalui <span>PentaWork</span>
      </h1>
      <p class="hero-sub">
        Pembayaran aman, pekerjaan terjamin
      </p>
    </section>

    <!-- Two Cards -->
    <div class="container cards-row">
      <div class="row g-4 justify-content-center">
        <!-- Left Card -->
        <div class="col-md-6">
          <div class="card-custom card-left shadow-sm">
            <h3 class="card-title">Become a Candidate</h3>
            <p class="mb-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus a dolor convallis efficitur.
            </p>
            <a class="btn btn-ghost-dark" href="{{ url('register') }}">
              Register Now
            </a>
          </div>
        </div>

        <!-- Right Card -->
        <div class="col-md-6">
          <div class="card-custom card-right shadow">
            <h3 class="card-title">Become a Employers</h3>
            <p class="mb-4">
              Cras in malesuada pellentesque, mollis ligula non, luctus dui. Maecenas sed erat dolor.
            </p>
            <a class="btn btn-ghost-light" href="{{ url('register-company') }}">
              Register Now →
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS (opsional untuk komponen lain) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- [web:17] -->
  </body>
</html>
