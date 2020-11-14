<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id', 'bdmc_no', 'address', 'score'
    ];
}
