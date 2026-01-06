<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('employer_id', auth()->id())
            ->latest()
            ->get();

        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required',
            'level' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
            'deadline' => 'required|date',
            'summary' => 'required',
            'responsibility' => 'required',
            'qualification' => 'required',
            'benefit' => 'nullable',
            'apply_email' => 'required|email',
            'whatsapp' => 'nullable',
        ]);

        Job::create([
            'employer_id' => auth()->id(),
            'status' => $request->has('publish_now') ? 'published' : 'draft',
            ...$validated
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Lowongan berhasil dibuat');
    }

    public function edit(Job $job)
    {
        return view('employer.jobs.edit', compact('job'));
    }

    public function destroy(Job $job): RedirectResponse
    {
        // Optional: pastikan hanya employer pemilik job yang bisa hapus
        if ($job->employer_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Lowongan berhasil dihapus');
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required',
            'level' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
            'deadline' => 'required|date',
            'summary' => 'required',
            'responsibility' => 'required',
            'qualification' => 'required',
            'benefit' => 'nullable',
            'apply_email' => 'required|email',
            'publish_now' => 'required|in:published,draft,finished',
            'whatsapp' => 'nullable',
        ]);
        // dd($validated);

        $job->update(['status' => $request->publish_now, ...$validated]);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Lowongan berhasil diperbarui');
    }

    public function applicants($jobId)
    {
        $job = Job::with('applicants')->findOrFail($jobId); // pastikan relasi applicants ada di model Job
        return view('jobs.applicants', compact('job'));
    }

}