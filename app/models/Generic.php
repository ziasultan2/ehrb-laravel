<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
    protected $fillable = ['name'];

    public function generic()
    {
        return $this->hasOne('App\MedicineList', 'id', 'generic_id');
    }
}
