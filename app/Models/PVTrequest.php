<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PVTrequest extends Model
{
    use HasFactory;

    public function patient_detail()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
