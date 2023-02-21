<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Time_slot;

class Appointment extends Model
{
    use HasFactory;
    public function time()
    {
        return $this->belongsTo(Time_slot::class, 'slot_id');
    }
}
