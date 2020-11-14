<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name', 'result', 'tested_in', 'diagnostic_center_id', 'pathologist_id'
    ];
}
