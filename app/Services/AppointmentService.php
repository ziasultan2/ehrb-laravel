<?php

namespace app\Services;

use App\models\Appointment;

class AppointmentService
{
    public function getDoctorAppointment()
    {
        return Appointment::where('doctor_id', \Auth::user()->getDoctorId())->where('date', '=', date("Y/m/d"))->with('user')->get();
    }

    public function getUserAppointment()
    {
        return Appointment::where('user_id', '=', \Auth::id())->get();
    }

    public function show($id)
    {
        return Appointment::find($id)->with('user', 'test', 'radiology', 'medicine', 'precaution', 'allergy')->first();
    }

    public function store($request)
    {
        Appointment::create([
            'user_id' => 'id',
            'doctor_id' => $request['doctor_id'],
            'date' => $request['date'],
            'time' => 0
        ]);
    }

    public function update($request)
    {
    }
}
