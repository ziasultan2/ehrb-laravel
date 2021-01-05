<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MedicineList extends Model
{
    protected $fillable = [
        'name',
        'generic_id',
        'price',
        'company_name'
    ];
}
