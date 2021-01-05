<?php

namespace App\Http\Controllers;

use App\models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lat, $long)
    {

        $ambulance = DB::table("ambulances")
            ->select(
                "ambulances.*",
                DB::raw("6371 * acos(cos(radians(" . $lat . "))
                        * cos(radians(latitude))
                        * cos(radians(longitude) - radians(" . $long . "))
                        + sin(radians(" . $lat . "))
                        * sin(radians(latitude))) AS distance")
            )
            ->where('status', '=', '1')
            ->orderBy('distance')
            ->take(10)
            ->get();

        return response()->json(['ambulance' => $ambulance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
