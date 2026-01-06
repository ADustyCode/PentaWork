<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobseekerDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'applications' => 8,
            'interviews' => 3,
            'saved_jobs' => 12,
        ];

        $profileCompletion = 70;

        return view('dashboard.jobseeker', compact('stats', 'profileCompletion'));
    }
}
