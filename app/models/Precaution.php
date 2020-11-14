<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Precaution extends Model
{
    protected $fillable = [
        'name', 'appointment_id'
    ];
}
