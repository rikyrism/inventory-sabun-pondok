<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Method untuk mendapatkan notifikasi (tidak digunakan karena notifikasi disimpan di localStorage)
     * tetapi tetap disediakan untuk pengembangan di masa depan
     */
    public function getNotifications()
    {
        return response()->json(['success' => true]);
    }

    /**
     * Method untuk menghapus semua notifikasi (tidak digunakan karena notifikasi disimpan di localStorage)
     * tetapi tetap disediakan untuk pengembangan di masa depan
     */
    public function clearNotifications()
    {
        return response()->json(['success' => true]);
    }
}