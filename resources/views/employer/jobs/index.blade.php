@extends('layouts.app')

@section('content')
  <div class="container">
    <h4 class="mb-3">Lowongan Saya</h4>
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">
      + Buat Lowongan
    </a>

    @forelse($jobs as $job)
      <div class="card mb-2">
        <div class="card-body d-flex justify-content-between align-items-start">

          {{-- Info Lowongan --}}
          <div>
            <strong>{{ $job->title }}</strong>
            <span class="badge bg-{{ $job->status == 'published' ? 'success' : ($job->status == 'finished' ? 'primary' : 'warning')  }}">{{ $job->status }}</span>
          </div>

          {{-- Tombol titik 3 --}}
          <div class="dropdown">
            <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              &#8942;
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li>
                <a class="dropdown-item" href="{{ route('jobs.applications', $job->id) }}">
                  Lihat Pelamar
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('jobs.edit', $job->id) }}">
                  Edit
                </a>
              </li>

              <li>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item text-danger">
                    Hapus
                  </button>
                </form>
              </li>
            </ul>
          </div>

        </div>
      </div>
    @empty
      <p class="text-muted">Belum ada lowongan</p>
    @endforelse
  </div>
@endsection