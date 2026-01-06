<?php

namespace App\Http\Controllers;

use App\Models\JobseekerProfile;
use Illuminate\Http\Request;

class JobseekerProfileController extends Controller
{
    /**
     * Tampilkan profil (read-only)
     */
    public function show()
    {
        $user = auth()->user();

        abort_if($user->user_type !== 'jobseeker', 403);

        $profile = $user->jobseekerProfile;

        return view('profile.jobseeker-show', compact('user', 'profile'));
    }

    /**
     * Form edit profil
     */
    public function edit()
    {
        $user = auth()->user();

        abort_if($user->user_type !== 'jobseeker', 403);

        $profile = JobseekerProfile::firstOrCreate(
            ['user_id' => $user->id]
        );

        return view('profile.jobseeker-edit', compact('profile'));
    }

    /**
     * Update profil
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        abort_if($user->user_type !== 'jobseeker', 403);

        $data = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'job_status' => 'nullable|string|max:50',
            'summary' => 'nullable|string',
            'main_field' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'skills' => 'nullable|string',
            'job_preference_type' => 'nullable|string|max:50',
            'job_preference_location' => 'nullable|string|max:50',
            'portfolio_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        JobseekerProfile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()
            ->route('jobseeker.profile.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
