<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [
        'name', 'appointment_id', 'status'
    ];

    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
}
