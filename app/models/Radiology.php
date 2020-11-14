<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Radiology extends Model
{
    protected $fillable = [
        'user_id', 'path', 'doctor_id', 'diagnostic_center_id', 'note'
    ];
}
