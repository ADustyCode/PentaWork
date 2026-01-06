@extends('layouts.app') {{-- Asumsi pakai layout utama --}}

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        {{-- Konten utama --}}
        @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
        <main class="col-md-9 ms-sm-auto col-lg-10 px-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h4">Halo, {{ auth()->user()->name }} 👋</h1>
            </div>

            {{-- Stats --}}
            <div class="row mb-4">
                @if(auth()->user()->user_type == 'jobseeker')
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <small class="text-muted">Lamaran dikirim</small>
                                <div class="h4">{{ $appliedCount }}</div>
                                <small class="text-muted">Sedang diproses: {{ $interviewCount }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <small class="text-muted">Lowongan tersimpan</small>
                                <div class="h4">{{ $savedCount }}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <small class="text-muted">Lowongan Aktif</small>
                                <div class="h4">{{ $jobsCount }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <small class="text-muted">Total Pelamar</small>
                                <div class="h4">{{ $applicantsCount }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <small class="text-muted">Sedang diproses</small>
                                <div class="h4">{{ $pendingCount }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Hero --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4">
                    <div>
                        <h2 class="h5">Selamat datang di <span class="text-primary">PentaWork</span></h2>
                        <p class="mb-0">{{ auth()->user()->user_type == 'jobseeker' ? 'Temukan pekerjaan terbaru dan kelola lamaran Anda.' : 'Kelola lowongan dan pantau pelamar Anda.' }}</p>
                    </div>
                    <img src="{{ asset('image/pekerja.jpg') }}" alt="Hero" class="img-fluid d-none d-md-block" style="max-height:180px;">
                </div>
            </div>

            {{-- Kategori --}}
            <h5 class="mb-3">Kategori TerPopuler</h5>
            <div class="row row-cols-2 row-cols-md-4 g-3">
                @foreach($categories as $category)
                <div class="col">
                    <div class="card text-center shadow-sm py-2">
                        <div class="h2">{{ $category->icon }}</div>
                        <div>{{ $category->name }}</div>
                    </div>
                </div>
                @endforeach
            </div>

        </main>
    </div>
</div>
@endsection
