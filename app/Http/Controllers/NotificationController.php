<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    // Daftar notifikasi
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(10);
        return view('notifications.index', compact('notifications'));
    }

    // Tandai notifikasi sebagai sudah dibaca
    public function markAsRead(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) abort(403);

        $notification->update(['is_read' => true]);
        return back();
    }

    // Hapus notifikasi
    public function destroy(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) abort(403);

        $notification->delete();
        return back()->with('success', 'Notifikasi dihapus');
    }
}
