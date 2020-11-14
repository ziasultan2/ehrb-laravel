<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = [
        'date', 'details', 'appointment_id'
    ];
}
