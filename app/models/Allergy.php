<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = [
        'name', 'appointment_id'
    ];
}
