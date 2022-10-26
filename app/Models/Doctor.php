<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function appoint(){
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function slot_det(){
        return $this->belongsTo(Slot::class);
    }
}
