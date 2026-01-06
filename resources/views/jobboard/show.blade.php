@extends('layouts.app')

@section('content')
  <style>
    :root {
      --primary: #2563eb;
      --primary-soft: #e0edff;
      --bg: #f5f7fb;
      --card: #ffffff;
      --text: #111827;
      --muted: #6b7280;
      --border: #e5e7eb;
      --radius: 14px;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .brand {
      font-weight: 700;
      font-size: 20px;
      color: var(--primary);
    }

    .back-link {
      font-size: 13px;
      color: var(--muted);
      text-decoration: none;
    }

    .card-custom {
      background: var(--card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .job-avatar {
      width: 46px;
      height: 46px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: #fff;
      background: linear-gradient(135deg, #34d399, #10b981);
      font-size: 20px;
    }

    .tag-pill {
      padding: 4px 10px;
      border-radius: 999px;
      background: var(--primary-soft);
      color: var(--primary);
      font-size: 11px;
      font-weight: 600;
    }

    .tag-light {
      padding: 4px 10px;
      border-radius: 999px;
      background: #f3f4f6;
      color: var(--muted);
      font-size: 11px;
    }

    .section-title {
      font-size: 14px;
      font-weight: 600;
    }

    .section-text,
    .job-list {
      font-size: 13px;
      color: var(--muted);
    }

    .job-info-list {
      list-style: none;
      padding-left: 0;
      font-size: 13px;
      color: var(--muted);
    }

    .job-info-list li {
      display: flex;
      justify-content: space-between;
      margin-bottom: 6px;
    }

    .value {
      font-weight: 600;
      color: var(--text);
    }
  </style>

  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="brand">PentaWork</div>

      <a href="{{ route('jobboard.index') }}" class="back-link">
        ← Kembali ke daftar pekerjaan
      </a>
    </div>

    <div class="row g-3">
      @if(session('success'))
        <div class="alert alert-success small">
          {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-warning small">
          {{ session('error') }}
        </div>
      @endif


      <!-- MAIN CONTENT -->
      <main class="col-lg-8">
        <div class="card-custom p-3 p-md-4 h-100">

          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="job-avatar">
              {{ strtoupper(substr($job->title, 0, 1)) }}
            </div>

            <div>
              <h1 class="h5 mb-1">{{ $job->title }}</h1>
              <p class="mb-1 small text-muted">
                {{ $job->employer->name }}
                • {{ $job->location }}
                • Rp {{ number_format($job->salary, 0, ',', '.') }}
              </p>

              <div class="d-flex flex-wrap gap-2 mt-1">
                <span class="tag-pill">{{ $job->job_type }}</span>
                <span class="tag-light">
                  {{ now()->diffInDays($job->deadline) }} hari lagi
                </span>
              </div>
            </div>
          </div>

          <hr>

          <section class="mb-3">
            <h2 class="section-title">Ringkasan Pekerjaan</h2>
            <p class="section-text">{{ $job->summary }}</p>
          </section>

          <section class="mb-3">
            <h2 class="section-title">Tanggung Jawab Utama</h2>
            <ul class="job-list ps-3">
              @foreach(explode("\n", $job->responsibility) as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
          </section>

          <section class="mb-3">
            <h2 class="section-title">Kualifikasi</h2>
            <ul class="job-list ps-3">
              @foreach(explode("\n", $job->qualification) as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
          </section>

          @if($job->benefit)
            <section>
              <h2 class="section-title">Benefit</h2>
              <ul class="job-list ps-3">
                @foreach(explode("\n", $job->benefit) as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </section>
          @endif

        </div>
      </main>

      <!-- SIDEBAR -->
      <aside class="col-lg-4">
        <div class="card-custom p-3 p-md-4">
          <h2 class="section-title mb-2">Info Pekerjaan</h2>

          <ul class="job-info-list">
            <li><span>Posisi</span><span class="value">{{ $job->title }}</span></li>
            <li><span>Tipe</span><span class="value">{{ $job->job_type }}</span></li>
            <li><span>Lokasi</span><span class="value">{{ $job->location }}</span></li>
            <li><span>Gaji</span><span class="value">Rp {{ number_format($job->salary, 0, ',', '.') }}</span></li>
            <li>
              <span>Sisa waktu</span>
              <span class="value">{{ now()->diffInDays($job->deadline) }} hari</span>
            </li>
          </ul>

          @auth
            @if(auth()->user()->user_type === 'jobseeker')

              @if($hasApplied)
                <button class="btn btn-success w-100 rounded-pill mt-3" disabled>
                  ✓ Sudah Melamar
                </button>
              @elseif($job->status === "finished")
              <button class="btn btn-primary w-100 rounded-pill mt-3" disabled>
                  Lowongan sudah selesai
                </button>
              @else
                <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">
                    Lamar pekerjaan ini
                  </button>
                </form>
              @endif

            @endif
          @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100 rounded-pill mt-3">
              Login untuk Melamar
            </a>
          @endauth

          <p class="text-muted text-center small mt-2">
            Pastikan CV dan portofolio sudah diperbarui
          </p>
        </div>
      </aside>

    </div>
  </div>
@endsection