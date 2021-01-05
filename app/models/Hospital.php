<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'district_id',
        'thana_id',
        'address',
        'license_no',
        'latitude',
        'longitude'
    ];
}
