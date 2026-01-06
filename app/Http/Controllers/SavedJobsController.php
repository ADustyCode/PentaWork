<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedJob;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class SavedJobsController extends Controller
{
    // Tampilkan daftar lowongan tersimpan user
    public function index()
    {
        $user = Auth::user();

        $savedJobs = SavedJob::with('job')
            ->where('jobseeker_id', $user->id)
            ->get();

        return view('saved_jobs.index', compact('savedJobs'));
    }

    // Simpan lowongan ke saved jobs
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        // Cek apakah sudah tersimpan
        $exists = SavedJob::where('jobseeker_id', $user->id)
            ->where('job_id', $request->job_id)
            ->exists();

        if (!$exists) {
            SavedJob::create([
                'jobseeker_id' => $user->id,
                'job_id' => $request->job_id,
            ]);
        }

        return response()->json(['message' => 'Lowongan berhasil disimpan.']);
    }

    // Hapus lowongan dari saved jobs
    public function destroy($id)
    {
        $user = Auth::user();

        $savedJob = SavedJob::where('jobseeker_id', $user->id)
            ->where('job_id', $id)
            ->firstOrFail();

        $savedJob->delete();

        return response()->json(['message' => 'Lowongan berhasil dihapus dari tersimpan.']);
    }
}
