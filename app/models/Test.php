<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_id',
        'user_id',
        'type',
        'result',
        'tested_in',
        'diagnostic_center_id',
        'appointment_id',
        'tested_by'
    ];

    protected $with = array('testDetail');

    public function testDetail()
    {
        return $this->hasOne('App\Models\TestLists', 'id', 'test_id');
    }
}
