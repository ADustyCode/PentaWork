<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JobseekerSettingsController extends Controller
{
    public function index()
    {
        return view('jobseeker.settings.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'summary'  => 'nullable|string|max:500',
        ]);

        $user = auth()->user();

        // Update User info
        $user->update([
            'name'  => $request->name,
            'phone' => $request->phone,
        ]);

        // Update or Create Jobseeker Profile info
        \App\Models\JobseekerProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'location' => $request->location,
                'summary'  => $request->summary,
            ]
        );

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'security');
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password saat ini salah'
            ])->with('active_tab', 'security');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui')->with('active_tab', 'security');
    }

    public function updateEmail(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'current_password' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('active_tab', 'security');
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password_email' => 'Password saat ini salah'
            ])->with('active_tab', 'security');
        }

        $user->update([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Email berhasil diperbarui')->with('active_tab', 'security');
    }
}
