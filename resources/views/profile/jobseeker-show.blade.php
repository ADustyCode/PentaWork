@extends('layouts.app')

@section('title', 'Profil ' . ($profile->full_name ?? $user->name))

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10">
    <!-- Card Profil -->
    <div class="card profile-card p-4 p-md-5 bg-white">
        <div class="row g-4">
            <!-- Avatar + Nama -->
            <div class="col-md-4 text-center">
                <h2 class="username mb-1">{{ $profile->full_name ?? $user->name }}</h2>
                @if($profile?->headline)
                    <span class="badge bg-primary-subtle text-primary">{{ $profile->headline }}</span>
                @endif
                <p class="text-muted mt-2 mb-0">{{ $user->email }}</p>
                @if($profile?->location)
                    <p class="text-muted small">{{ $profile->location }}</p>
                @endif
                <a href="{{ route('jobseeker.profile.edit') }}" class="btn btn-primary btn-sm mt-3">Edit Profil</a>
            </div>

            <!-- Detail Profil -->
            <div class="col-md-8">
                <!-- Ringkasan -->
                <div class="mb-4">
                    <div class="section-title">Ringkasan</div>
                    <p>{{ $profile->summary ?? 'Belum mengisi ringkasan diri.' }}</p>
                </div>
                <!-- Info Dasar -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">Bidang Utama</div>
                            <div>{{ $profile->main_field ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">Status Kerja</div>
                            <div>{{ $profile->job_status ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">Pengalaman</div>
                            <div>{{ $profile->experience_years ? $profile->experience_years . ' Tahun' : '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">Preferensi Kerja</div>
                            <div>
                                {{ $profile->job_preference_type ?? '-' }}
                                @if($profile?->job_preference_location)
                                    ({{ $profile->job_preference_location }})
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills -->
                <div class="mb-4">
                    <div class="section-title">Skill</div>
                    <div class="d-flex flex-wrap gap-2">
                        @if($profile?->skills)
                            @foreach(explode(',', $profile->skills) as $skill)
                                <span class="badge text-bg-light border">{{ trim($skill) }}</span>
                            @endforeach
                        @else
                            <span class="text-muted small">Belum mengisi skill</span>
                        @endif
                    </div>
                </div>

                <!-- Links -->
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">Portfolio</div>
                            @if($profile?->portfolio_url)
                                <a href="{{ $profile->portfolio_url }}" target="_blank">{{ $profile->portfolio_url }}</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-box">
                            <div class="section-title">LinkedIn</div>
                            @if($profile?->linkedin_url)
                                <a href="{{ $profile->linkedin_url }}" target="_blank">{{ $profile->linkedin_url }}</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Card Profil -->
  </div>
</div>
@endsection
