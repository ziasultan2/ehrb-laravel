<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'type', 'name', 'dose', 'intervals', 'notes', 'duration', 'appointment_id', 'status'
    ];
}
