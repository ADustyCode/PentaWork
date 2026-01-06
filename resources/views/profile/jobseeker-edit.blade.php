@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container profile-header">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <div class="card profile-card p-4 p-md-5 bg-white">
        <h4 class="mb-4 fw-semibold">Edit Profil Jobseeker</h4>

        {{-- ALERT --}}
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('jobseeker.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row g-4">

            {{-- FORM --}}
            <div class="col-md-8">

              {{-- NAMA --}}
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input
                  type="text"
                  name="full_name"
                  class="form-control"
                  value="{{ old('full_name', $profile->full_name) }}"
                  required
                >
              </div>

              {{-- HEADLINE --}}
              <div class="mb-3">
                <label class="form-label">Headline Profesional</label>
                <input
                  type="text"
                  name="headline"
                  class="form-control"
                  placeholder="Contoh: Full-Stack Developer | Laravel"
                  value="{{ old('headline', $profile->headline) }}"
                >
              </div>

              {{-- LOKASI --}}
              <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input
                  type="text"
                  name="location"
                  class="form-control"
                  value="{{ old('location', $profile->location) }}"
                >
              </div>

              {{-- STATUS KERJA --}}
              <div class="mb-3">
                <label class="form-label">Status Kerja</label>
                <select name="job_status" class="form-select">
                  <option value="">-- Pilih --</option>
                  <option value="open" @selected($profile->job_status === 'open')>Terbuka untuk kerja</option>
                  <option value="freelance" @selected($profile->job_status === 'freelance')>Freelance</option>
                  <option value="not_open" @selected($profile->job_status === 'not_open')>Tidak mencari kerja</option>
                </select>
              </div>

              {{-- SUMMARY --}}
              <div class="mb-3">
                <label class="form-label">Tentang Saya</label>
                <textarea
                  name="summary"
                  class="form-control"
                  rows="4"
                >{{ old('summary', $profile->summary) }}</textarea>
              </div>

              {{-- BIDANG --}}
              <div class="mb-3">
                <label class="form-label">Bidang Utama</label>
                <input
                  type="text"
                  name="main_field"
                  class="form-control"
                  value="{{ old('main_field', $profile->main_field) }}"
                >
              </div>

              {{-- EXPERIENCE --}}
              <div class="mb-3">
                <label class="form-label">Pengalaman (tahun)</label>
                <input
                  type="number"
                  name="experience_years"
                  class="form-control"
                  min="0"
                  max="50"
                  value="{{ old('experience_years', $profile->experience_years) }}"
                >
              </div>

              {{-- SKILLS --}}
              <div class="mb-3">
                <label class="form-label">Skill (pisahkan dengan koma)</label>
                <input
                  type="text"
                  name="skills"
                  class="form-control"
                  placeholder="Laravel, MySQL, REST API"
                  value="{{ old('skills', $profile->skills) }}"
                >
              </div>

              {{-- PREFERENSI --}}
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Tipe Pekerjaan</label>
                  <select name="job_preference_type" class="form-select">
                    <option value="">-- Pilih --</option>
                    <option value="fulltime" @selected($profile->job_preference_type === 'fulltime')>Full-time</option>
                    <option value="parttime" @selected($profile->job_preference_type === 'parttime')>Part-time</option>
                    <option value="freelance" @selected($profile->job_preference_type === 'freelance')>Freelance</option>
                    <option value="remote" @selected($profile->job_preference_type === 'remote')>Remote</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Preferensi Lokasi</label>
                  <input
                    type="text"
                    name="job_preference_location"
                    class="form-control"
                    value="{{ old('job_preference_location', $profile->job_preference_location) }}"
                  >
                </div>
              </div>

              {{-- LINK --}}
              <div class="mb-3">
                <label class="form-label">Portfolio</label>
                <input
                  type="url"
                  name="portfolio_url"
                  class="form-control"
                  value="{{ old('portfolio_url', $profile->portfolio_url) }}"
                >
              </div>

              <div class="mb-4">
                <label class="form-label">LinkedIn</label>
                <input
                  type="url"
                  name="linkedin_url"
                  class="form-control"
                  value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                >
              </div>

              {{-- BUTTON --}}
              <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('jobseeker.profile.show') }}" class="btn btn-outline-secondary">
                  Batal
                </a>
                <button class="btn btn-primary text-white">
                  Simpan Perubahan
                </button>
              </div>

            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
