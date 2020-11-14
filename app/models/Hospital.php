<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'phone', 'thana', 'district', 'address', 'license_no'
    ];
}
