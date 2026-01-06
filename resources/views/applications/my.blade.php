@extends('layouts.app')

@section('title', 'Lamaran Saya')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Lamaran Saya</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success small">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Pekerjaan</th>
                        <th>Perusahaan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $application->job->title }}</strong>
                            </td>

                            <td>
                                {{ $application->job->employer->name }}
                            </td>

                            <td>
                                {{ $application->job->location }}
                            </td>

                            <td>
                                @if($application->job->status === 'finished')
                                    <span class="badge bg-danger text-dark">Lowongan ditutup</span>
                                @elseif($application->job->status === 'draft')
                                    <span class="badge bg-danger text-dark">Lowongan diarsipkan</span>
                                @endif
                                @if($application->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($application->status === 'accepted')
                                    <span class="badge bg-success">Diterima</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>

                            <td>
                                {{ $application->created_at->format('d M Y') }}
                            </td>

                            <td>
                                <a href="{{ route('jobboard.show', $application->job->id) }}"
                                    class="btn btn-sm btn-outline-primary{{ $application->job->status === 'finished' ? ' disabled' : ($application->job->status === 'draft' ? ' disabled' : '')}}">
                                    Detail
                                </a>
                                @if($application->status === 'accepted')
                                    <a href="https://wa.me/{{ $application->job->whatsapp }}"
                                        class="btn btn-sm btn-outline-primary{{ $application->job->status === 'finished' ? ' disabled' : ''}}">
                                        Hubungi
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Kamu belum melamar pekerjaan apapun.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $applications->links() }}
    </div>

@endsection