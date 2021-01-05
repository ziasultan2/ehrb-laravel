<?php

namespace App\Http\Controllers;


use App\models\Appointment;

use App\models\TestLists;
use App\Services\AppointmentService;
use App\Services\UserAppointmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /** @var UserAppointmentService  */
    private $userAppointmentService;

    public function __construct(UserAppointmentService $userAppointmentService)
    {
        $this->userAppointmentService = $userAppointmentService;
    }

    public function index()
    {
        $userId = Auth::id();
        $appointment = Appointment::where('user_id', '=', $userId)->get();
        return response()->json(['appointments' => $appointment]);
    }

    public function show($id)
    {
        $data = Appointment::where('id', '=', $id)->with('test', 'medicine')->first();
        return response()->json(['appointment' => $data]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
    }

    public function store(Request $request)
    {
        return $this->userAppointmentService->create($request);
        return response()->json(['success' => 'true']);
    }
}
