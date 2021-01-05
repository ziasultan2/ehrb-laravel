<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'type',
        'medicine_id',
        'user_id',
        'dose',
        'duration',
        'appointment_id',
        'status'
    ];

    protected $with = array('medicineDetail');

    public function medicineDetail()
    {
        return $this->hasOne('App\models\MedicineList', 'id', 'medicine_id');
    }
}
