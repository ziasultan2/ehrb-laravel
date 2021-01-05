<?php

namespace App\Http\Controllers;

use App\models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\models\Doctor;

class DoctorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;
        $today = Carbon::now()->format('d-m-Y');
        $day = 'Fri';
        $appointmentDate = Carbon::parse("next " . $day)->format('d-m-Y');

        $doctor = Doctor::where('user_id', '=', 1)->first();
        $appointment = $doctor->appointment;
        $data = $this->textToJson($appointment);

        return $data['days'][1];
    }

    public function textToJson($string)
    {
        $string = str_replace('\n', '', $string);
        $string = rtrim($string, ',');
        $json = json_decode($string, true);
        return $json;
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
    public function show($id)
    {
        //
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
