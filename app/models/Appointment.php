<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'serial_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
