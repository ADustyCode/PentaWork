<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>Buat Lowongan Baru - PentaWork</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f7fb;
    }

    .brand {
      font-weight: 700;
      font-size: 22px;
      color: #2563eb;
    }

    .brand span {
      color: #0f172a;
    }

    .card-form {
      border-radius: 18px;
    }
  </style>
</head>

<body>

  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <div class="brand">Penta<span>Work</span></div>
        <p class="text-muted small mb-0">Buat lowongan baru dan temukan talenta terbaik.</p>
      </div>
      <a href="{{ route('dashboard') }}" class="small text-decoration-none">&larr; Kembali</a>
    </div>

    <div class="card shadow-sm border-0 card-form">
      <div class="card-body p-4">
        <h1 class="h5 mb-3">Form Lowongan Baru</h1>

        <form method="POST" action="{{ route('jobs.store') }}">
          @csrf

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small">Judul Posisi</label>
              <input type="text" name="title" class="form-control" placeholder="Contoh: Software Engineer" required>
            </div>

            <div class="col-md-3">
              <label class="form-label small">Tipe Kerja</label>
              <select name="job_type" class="form-select">
                <option>Full Time</option>
                <option>Part Time</option>
                <option>Kontrak</option>
                <option>Freelance</option>
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label small">Level</label>
              <select name="level" class="form-select">
                <option>Junior</option>
                <option>Mid</option>
                <option>Senior</option>
              </select>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <label class="form-label small">Lokasi</label>
              <input type="text" name="location" class="form-control" placeholder="Bojonegoro, Remote, dll">
            </div>
            <div class="col-md-4">
              <label class="form-label small">Rentang Gaji (opsional)</label>
              <div class="input-group"><!-- input-group Bootstrap [web:138] -->
                <span class="input-group-text">Rp</span>
                <input type="number" name="salary" class="form-control" placeholder="5.000.000">
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label small">Batas waktu lamaran</label>
              <input type="date" name="deadline" class="form-control">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label small">Ringkasan Pekerjaan</label>
            <textarea name="summary" class="form-control" rows="3"
              placeholder="Jelaskan secara singkat tujuan posisi ini dan peran utama kandidat."></textarea>
          </div>

          <!-- tanggung jawab -->
          <div class="mb-3">
            <label class="form-label small">Tanggung Jawab Utama</label>
            <textarea name="responsibility" class="form-control" rows="4" placeholder="Gunakan bullet point, misalnya:
- Mengembangkan fitur baru pada aplikasi PentaWork
- Berkolaborasi dengan tim produk dan desain
- Menulis dokumentasi teknis"></textarea>
          </div>

          <!-- kualifikasi -->
          <div class="mb-3">
            <label class="form-label small">Kualifikasi / Persyaratan</label>
            <textarea name="qualification" class="form-control" rows="4" placeholder="Contoh:
- Minimal D3/S1 Teknik Informatika atau sederajat
- Menguasai JavaScript / React / Node.js
- Terbiasa menggunakan Git dan workflow kolaboratif"></textarea>
          </div>

          <!-- benefit -->
          <div class="mb-3">
            <label class="form-label small">Benefit</label>
            <textarea name="benefit" class="form-control" rows="3"
              placeholder="Contoh: gaji kompetitif, asuransi kesehatan, remote working, dll."></textarea>
          </div>

          <!-- pengaturan tambahan -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label small">Email penerima lamaran</label>
              <input type="email" name="apply_email" class="form-control" placeholder="hr@perusahaan.com">
              <div class="form-text">Lamaran akan dikirim ke email ini. [web:42]</div>
            </div>
            <div class="col-md-6">
              <label class="form-label small">Nomor WhatsApp HRD</label>
              <input type="number" name="whatsapp" class="form-control" placeholder="085733134679">
            </div>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="publish_now" id="publishNow">
            <label class="form-check-label small" for="publishNow">
              Terbitkan sekarang
            </label>
          </div>

          <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>

</html>