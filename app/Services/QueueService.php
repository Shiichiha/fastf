<?php

namespace App\Services;

use App\Models\QueueSetting;
use App\Models\Order;
use Illuminate\Support\Str;

class QueueService
{
    public static function generate()
    {
        $q = QueueSetting::firstOrCreate([]);

        if ($q->last_reset_date != now()->toDateString()) {
            $q->update(['current_letter' => 'A', 'current_number' => 1, 'last_reset_date' => now()]);
        }

        if ($q->current_number > 99) {
            $nextLetter = $q->current_letter == 'Z' ? 'A' : chr(ord($q->current_letter) + 1);
            $q->update(['current_letter' => $nextLetter, 'current_number' => 1]);
        }

        $code = $q->current_letter . str_pad($q->current_number, 2, '0', STR_PAD_LEFT);
        $q->increment('current_number');

        return $code;
    }

    public static function generateReceipt()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Order::where('receipt_code', $code)->exists());

        return $code;
    }
}