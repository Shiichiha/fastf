<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\QueueSetting;
use App\Models\Order;

Schedule::call(function () {
    QueueSetting::query()->update([
        'current_letter' => 'A',
        'current_number' => 1,
        'last_reset_date' => now(),
    ]);
})->dailyAt('00:00');

Schedule::call(function () {
    Order::where('payment_status', 'pending')
        ->where('expires_at', '<', now())
        ->delete();
})->everyMinute();

Schedule::call(function () {
    Order::where('payment_status', 'paid')
        ->where('confirmed_at', '<', now()->subHours(72))
        ->delete();
})->hourly();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
