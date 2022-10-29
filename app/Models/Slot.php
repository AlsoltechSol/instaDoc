<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function appoints(){
        return $this->hasMany(Appointment::class, 'slot_id');
    }

    
    public function doc_details(){
        return $this->hasMany(Doctor::class);
    }
}
