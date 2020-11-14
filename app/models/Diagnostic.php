<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $fillable = [
        'name', 'address', 'license_no'
    ];
}
