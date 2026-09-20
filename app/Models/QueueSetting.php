<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueSetting extends Model
{
    protected $fillable = ['current_letter', 'current_number', 'last_reset_date'];
}
