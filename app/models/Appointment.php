<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'disease_name',
        'observation',
        'precaution',
        'date',
        'serial_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function test()
    {
        return $this->hasMany('App\Models\Test');
    }

    public function medicine()
    {
        return $this->hasMany('App\Models\Medication');
    }
}
