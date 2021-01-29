<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'bdmc_no',
        'speciality',
        'district_id',
        'thana_id',
        'patient_no',
        'score',
        'short_bio',
        'chamber_address',
        'appointment',
        'about_doctor',
        'no_rating'
    ];
    protected $with = array('detail');

    public function detail()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
