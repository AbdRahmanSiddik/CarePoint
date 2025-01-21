<?php

namespace App\Listeners;

use App\Models\Medikit;
use App\Notifications\StockLowNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyStockLowAfterLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user; // User yang baru login
        $medikits = Medikit::where('stok', '<', 10)->get(); // Data stok rendah

        foreach ($medikits as $medikit) {
            $user->notify(new StockLowNotification($medikit)); // Kirim notifikasi
        }
    }
}
