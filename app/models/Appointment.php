<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'date', 'time'
    ];
}
