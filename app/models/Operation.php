<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'name',
        'doctor_id',
        'hospital_id',
        'date',
        'rating',
        'remarks'
    ];
}
