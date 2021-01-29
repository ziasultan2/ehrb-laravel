<?php

namespace app\Services;

use App\models\Appointment;
use App\models\Doctor;
use PhpParser\Comment\Doc;
use Carbon\Carbon;
use App\Common\Conversion;
use App\DTO\CheckAvailableDTO;
use App\models\AppointmentDetail;
use App\models\Medication;
use App\models\Test;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentService
{
    public function create($request)
    {
        $userId =  1; // $request['user_id'];
        $appointmentId =  2;  // $request['appointment_id'];
        $appointment = Appointment::find($appointmentId);
        $status = $appointment->status;
        $this->checkAndStoreAppointmentDetail($status, $appointmentId, $request);
        $this->addTest($request, $appointmentId, $userId);
        $this->addMedicine($request, $appointmentId, $userId);
        return 'success';
    }

    public function checkAndStoreAppointmentDetail($status, $appointmentId, $request)
    {
        // if ($status == 'followup') {
        //     $this->updateAppointmentDetail($appointmentId, $request);
        // } else if ($status == 'pending') {

        // }
        $this->addAppointmentDetail($appointmentId, $request);
    }

    public function updateAppointmentDetail($appointmentId, $request)
    {
        $appointment = AppointmentDetail::find($appointmentId);
        $appointment->disease_name = $request['disease_name'];
        $appointment->precaution = $request['precaution'];
        $appointment->status = $request['status'];
        $appointment->user_id = 1; //$request['user_id'];
        $appointment->save();
    }

    public function addAppointmentDetail($appointmentId, $request)
    {
        return AppointmentDetail::create([
            'appointment_id' => $appointmentId,
            'disease_name' => $request['disease_name'],
            'observation' => $request['observation'],
            // 'status' => $request['status'],
            'user_id' => 1,
        ]);
    }

    public function addTest($request, $appointmentId, $userId)
    {
        $test = array();
        foreach ($request['test'] as $key => $value) {
            if ($value != 0) {
                $a  = array('test_id' => $value, 'user_id' => $appointmentId, 'appointment_id' => $userId);
                array_push($test, $a);
            }
        }
        if ($test) {
            return Test::insert($test);
        }
    }

    public function addMedicine($request, $appointmentId, $userId)
    {
        $medicine = array();
        for ($i = 0; $i < count($request['medicine']); $i++) {
            if ($request['medicine'] != 0) {
                $a  = array(
                    'medicine_id' => $request['medicine'][$i],
                    'user_id' => $userId,
                    'dose' => $request['dose'][$i],
                    'duration' => $request['duration'][$i],
                    'appointment_id' => $appointmentId,

                );
                array_push($medicine, $a);
            }
        }
        if ($medicine) {
            return Medication::insert($medicine);
        }
    }
}
