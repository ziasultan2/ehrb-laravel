<?php

namespace app\Services;

use App\models\Appointment;
use App\models\Doctor;
use PhpParser\Comment\Doc;
use Carbon\Carbon;
use App\Common\Conversion;
use App\DTO\CheckAvailableDTO;
use Illuminate\Support\Facades\Auth;

class UserAppointmentService
{
    public function create($request)
    {
        $doctorId = $request['doctor_id'];
        $userId = Auth::id();
        $day = $request['day'];
        $appointmentDate = Carbon::parse("next " . $day)->format('Y-m-d');
        $doctor = Doctor::find($doctorId);
        $json = Conversion::textToJson($doctor->appointment);
        $availableDTO = $this->checkAvailable($json, $day);
        if ($availableDTO->getStatus() == true) {
            $result =  $this->store($userId, $doctorId, $appointmentDate, $availableDTO->getSerialNo());
            $this->updateDoctorAppointment($json, $availableDTO->getPosition(), $doctorId);
            return response()->json(['success' => true, 'appointment' => $result]);
        }

        return response()->json(['success' => $availableDTO->getSerialNo()]);
    }

    public function checkAvailable($json, $day)
    {
        for ($i = 0; $i < count($json['days']); $i++) {
            $dayDetail = $json['days'][$i];
            if ($dayDetail['day'] == $day) {
                if ($dayDetail['patient'] < $dayDetail['limit']) {
                    $checkAvailable = new CheckAvailableDTO(true, $i, $dayDetail['patient']);
                    return $checkAvailable;
                }
            }
        }
        return $checkAvailable = new CheckAvailableDTO(false, $i, 0);;
    }

    public function store($userId, $doctorId, $appointmentDate, $serialId)
    {
        return Appointment::create([
            'user_id' => $userId,
            'doctor_id' => $doctorId,
            'date' => $appointmentDate,
            'serial_id' => $serialId += 1,
        ]);
    }

    public function updateDoctorAppointment($json, $position, $doctorId)
    {
        $data = $json['days'][$position]['patient'] += 1;
        $doctor = Doctor::find($doctorId);
        $doctor->appointment = json_encode($json);
        $doctor->save();
    }
}
