<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function patient_details_appoint()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor_details_appoint()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function slot_details_appoint()
    {
        return $this->belongsTo(Slot::class, 'slot_id');
    }
}
