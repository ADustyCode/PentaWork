@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Form Pencarian --}}
    <form class="row g-2 mb-4" method="GET" action="{{ route('jobboard.index') }}">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}"
                class="form-control" placeholder="Cari judul lowongan...">
        </div>

        <div class="col-md-3">
            <input type="text" name="location" value="{{ request('location') }}"
                class="form-control" placeholder="Lokasi">
        </div>

        <div class="col-md-3">
            <select name="job_type" class="form-control">
                <option value="">Tipe Pekerjaan</option>
                <option value="Full Time" {{ request('job_type')=='Full Time'?'selected':'' }}>Full Time</option>
                <option value="Part Time" {{ request('job_type')=='Part Time'?'selected':'' }}>Part Time</option>
                <option value="Contract" {{ request('job_type')=='Contract'?'selected':'' }}>Contract</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    {{-- Daftar Lowongan --}}
    @if($jobs->count())
        <div class="row g-3">
            @foreach($jobs as $job)
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>{{ $job->title }}</h5>
                    <p class="mb-1">{{ $job->employer->name }} • {{ $job->location }}</p>
                    <p class="mb-1">Rp {{ number_format($job->salary,0,',','.') }} • {{ $job->job_type }}</p>
                    <a href="{{ route('jobboard.show', $job) }}" class="btn btn-sm btn-primary">Detail</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $jobs->links() }}
        </div>
    @else
        <p class="text-muted">Tidak ada lowongan ditemukan.</p>
    @endif

</div>
@endsection
