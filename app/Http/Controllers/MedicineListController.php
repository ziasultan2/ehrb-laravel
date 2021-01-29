<?php

namespace App\Http\Controllers;

use App\models\Generic;
use App\models\MedicineList;
use Illuminate\Http\Request;

class MedicineListController extends Controller
{
    public function getGeneric($id)
    {
        $data = MedicineList::where('generic_id', '=', $id)->orderBy('price')->get();
        return response()->json(['medicines' => $data]);
    }
}
