<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;
use App\Models\SavedJob;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $categories = Category::all();

    if ($user->user_type == 'jobseeker') {
        $appliedCount = Application::where('jobseeker_id', $user->id)->count();
        $interviewCount = Application::where('jobseeker_id', $user->id)
                                     ->where('status', 'interview')
                                     ->count();
        $savedCount = SavedJob::where('jobseeker_id', $user->id)->count();

        return view('dashboard.index', compact('appliedCount', 'interviewCount', 'savedCount', 'categories'));
    }

    if ($user->user_type == 'employer') {
        $jobsCount = Job::where('employer_id', $user->id)->where('status', 'published')->count();
        $applicantsCount = Application::whereIn('job_id', function($q) use ($user) {
            $q->select('id')->from('jobs')->where('employer_id', $user->id);
        })->count();
        $pendingCount = Application::whereIn('job_id', function($q) use ($user) {
            $q->select('id')->from('jobs')->where('employer_id', $user->id);
        })->where('status', 'pending')->count();

        return view('dashboard.index', compact('jobsCount', 'applicantsCount', 'pendingCount', 'categories'));
    }
}

}
