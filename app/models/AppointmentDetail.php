<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{
    protected $fillable = [
        'appointment_id',
        'user_id',
        'disease_name',
        'observation',
        'precaution',
        'status'
    ];
    public function test()
    {
        return $this->hasMany('App\Models\Test', 'id', 'appointment_id');
    }

    public function medicine()
    {
        return $this->hasMany('App\Models\Medication', 'id', 'appointment_id');
    }
}
