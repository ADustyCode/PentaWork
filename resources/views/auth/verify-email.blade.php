@if(auth()->user()->hasVerifiedEmail())
    <script>window.location.href = "{{ route('dashboard') }}";</script>
@endif
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 text-center">
        <h5>Verifikasi Email</h5>

        <p class="text-muted mt-2">
          Kami telah mengirim link verifikasi ke email kamu.
          Silakan cek inbox atau folder spam.
        </p>

        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button class="btn btn-primary mt-3">
            Kirim Ulang Email
          </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
          @csrf
          <button class="btn btn-link text-danger">
            Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
