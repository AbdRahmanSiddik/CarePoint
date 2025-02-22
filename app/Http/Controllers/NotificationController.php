<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead(); // Tandai semua notifikasi sebagai dibaca

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }
}
