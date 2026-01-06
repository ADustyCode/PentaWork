@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Notifikasi Saya</h4>

    @forelse($notifications as $notif)
        <div class="card mb-2 {{ $notif->is_read ? 'bg-light' : 'bg-white' }}">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $notif->title }}</strong>
                    <p class="mb-0">{{ $notif->message }}</p>
                    <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                </div>
                <div class="d-flex gap-1">
                    @if(!$notif->is_read)
                        <form action="{{ route('notifications.read', $notif->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success">Tandai dibaca</button>
                        </form>
                    @endif
                    <form action="{{ route('notifications.destroy', $notif->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada notifikasi.</p>
    @endforelse

    <div class="mt-3">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
