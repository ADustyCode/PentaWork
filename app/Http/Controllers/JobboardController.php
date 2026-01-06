<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobBoardController extends Controller
{
     public function index(Request $request)
    {
        $query = Job::query()->where('status', '!=', 'finished'); // abaikan lowongan selesai

        // Filter berdasarkan input search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->latest()->paginate(10)->withQueryString();

        return view('jobboard.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        abort_if($job->status !== 'published', 404);
        $hasApplied = false;

        if (auth()->check() && auth()->user()->user_type === 'jobseeker') {
            $hasApplied = \App\Models\Application::where('job_id', $job->id)
                ->where('jobseeker_id', auth()->id())
                ->exists();
        }

        return view('jobboard.show', compact('job', 'hasApplied'));

    }


}
