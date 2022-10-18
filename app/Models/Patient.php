<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function pvt_request(){
        return $this->hasMany(PVTrequest::class, 'patient_id');
    }

    public function medical_report(){
        return $this->hasMany(MedicalReport::class, 'patient_id');
    }
}
