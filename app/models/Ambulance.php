<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [
        'name',
        'district_id',
        'thana_id',
        'license_no',
        'latitude',
        'longitude',
        'phone_no',
        'status',
        'total_rating',
        'no_rating'
    ];
}
