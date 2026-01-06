<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'jobs_active' => 6,
            'applicants' => 48,
            'in_review' => 9,
        ];

        return view('dashboard.employer', compact('stats'));
    }
}
