<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MedicalDepartment extends Model
{
    protected $fillable = [
        'name',
        'photo'
    ];
}
