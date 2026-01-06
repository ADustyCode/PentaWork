@extends('layouts.app')

@section('title', 'Job Board')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Job Board</h1>

        <form action="{{ route('jobs.index') }}" method="GET" class="flex items-center gap-2">
            <input
                type="text"
                name="search"
                placeholder="Cari posisi, perusahaan..."
                value="{{ request('search') }}"
                class="border border-gray-300 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </form>
    </div>

    {{-- Filter Kategori --}}
    <div class="mb-6">
        <form method="GET" class="flex items-center gap-3">
            <select
                name="category"
                class="border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Kategori</option>
                @foreach(($categories ?? []) as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select
                name="type"
                class="border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Tipe</option>
                <option value="fulltime" {{ request('type') == 'fulltime' ? 'selected' : '' }}>Full-Time</option>
                <option value="parttime" {{ request('type') == 'parttime' ? 'selected' : '' }}>Part-Time</option>
                <option value="intern" {{ request('type') == 'intern' ? 'selected' : '' }}>Internship</option>
                <option value="freelance" {{ request('type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
            </select>

            <button
                class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                Terapkan
            </button>
        </form>
    </div>

    @php
  // fallback: jika $categories tidak diset, jadikan koleksi kosong agar tidak error
  $categories = $categories ?? collect();
@endphp

<select name="category" class="...">
  <option value="">Semua Kategori</option>
  @foreach($categories as $cat)
    <option value="{{ $cat }}" {{ (request('category') == $cat) ? 'selected' : '' }}>
      {{ $cat }}
    </option>
  @endforeach
</select>


    {{-- Job List --}}
    <div class="space-y-6">
        @forelse (($jobs ?? []) as $job)
            <div class="border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            <a href="{{ route('jobs.show', $job->id) }}" class="hover:text-blue-600 transition">
                                {{ $job->title }}
                            </a>
                        </h2>

                        <p class="text-gray-600 mt-1">
                            {{ $job->company }}
                        </p>

                        <div class="flex items-center gap-3 mt-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-briefcase"></i>
                                {{ ucfirst($job->type) }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-calendar"></i>
                                Diposting {{ $job->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ route('jobs.show', $job->id) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Detail
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-600 text-center py-10">Tidak ada lowongan ditemukan.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
