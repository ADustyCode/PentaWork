<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>Edit Lowongan - PentaWork</title>
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
        <p class="text-muted small mb-0">Edit lowongan pekerjaan.</p>
      </div>
      <a href="{{ route('dashboard') }}" class="small text-decoration-none">&larr; Kembali</a>
    </div>

    <div class="card shadow-sm border-0 card-form">
      <div class="card-body p-4">
        <h1 class="h5 mb-3">Edit Lowongan</h1>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('jobs.update', $job->id) }}">
          @csrf
          @method('PUT')

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small">Judul Posisi</label>
              <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" required>
            </div>

            <div class="col-md-3">
              <label class="form-label small">Tipe Kerja</label>
              <select name="job_type" class="form-select">
                @foreach(['Full Time', 'Part Time', 'Kontrak', 'Freelance'] as $type)
                  <option value="{{ $type }}" @selected($job->job_type === $type)>
                    {{ $type }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label small">Level</label>
              <select name="level" class="form-select">
                @foreach(['Junior', 'Mid', 'Senior'] as $level)
                  <option value="{{ $level }}" @selected($job->level === $level)>
                    {{ $level }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <label class="form-label small">Lokasi</label>
              <input type="text" name="location" class="form-control" value="{{ old('location', $job->location) }}">
            </div>

            <div class="col-md-4">
              <label class="form-label small">Gaji</label>
              <input type="number" name="salary" class="form-control" value="{{ old('salary', $job->salary) }}">
            </div>

            <div class="col-md-4">
              <label class="form-label small">Batas Lamaran</label>
              <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $job->deadline->format('Y-m-d')) }}">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label small">Ringkasan Pekerjaan</label>
            <textarea name="summary" class="form-control" rows="3"
              placeholder="Jelaskan secara singkat tujuan posisi ini dan peran utama kandidat.">{{ old('summary', $job->summary) }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label small">Tanggung Jawab Utama</label>
            <textarea name="responsibility" class="form-control" rows="4" placeholder="Gunakan bullet point, misalnya:
- Mengembangkan fitur baru pada aplikasi PentaWork
- Berkolaborasi dengan tim produk dan desain
- Menulis dokumentasi teknis">{{ old('responsibility', $job->responsibility) }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label small">Kualifikasi / Persyaratan</label>
            <textarea name="qualification" class="form-control" rows="4" placeholder="Contoh:
- Minimal D3/S1 Teknik Informatika atau sederajat
- Menguasai JavaScript / React / Node.js
- Terbiasa menggunakan Git dan workflow kolaboratif">{{ old('qualification', $job->qualification) }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label small">Benefit</label>
            <textarea name="benefit" class="form-control" rows="3"
              placeholder="Contoh: gaji kompetitif, asuransi kesehatan, remote working, dll.">{{ old('benefit', $job->benefit) }}</textarea>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label small">Email penerima lamaran</label>
              <input type="email" name="apply_email" class="form-control" value="{{ old('apply_email', $job->apply_email) }}" placeholder="hr@perusahaan.com">
              <div class="form-text">Lamaran akan dikirim ke email ini. [web:42]</div>
            </div>
            <div class="col-md-6">
              <label class="form-label small">Nomor WhatsApp HRD</label>
              <input type="number" name="whatsapp" class="form-control" value="{{ old('whatsapp', $job->whatsapp) }}"
                placeholder="WhatsApp HR">
            </div>
          </div>


          <label class="form-check-label small" for="publish_now">
            Status lowongan:
          </label>
          <select name="publish_now">
            <option value="published" {{ $job->status ? 'selected' : '' }}>Terbit</option>
            <option value="draft" {{ !$job->status ? 'selected' : '' }}>Draft</option>
            <option value="finished" {{ !$job->status ? 'selected' : '' }}>Finished</option>
          </select>


          <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">
              Update Lowongan
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>

</html>