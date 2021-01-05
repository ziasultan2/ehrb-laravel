<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Appointment;
use App\Services\AppointmentService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $appointmentService;
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // User role
        $role = \Auth::user()->type;

        // Check user role
        switch ($role) {
            case '1':
                return view('home');
                break;
            case '2':
                $app = $this->appointmentService->getDoctorAppointment();
                return view('doctor.appointment', compact('app'));
                break;
            case '3':
                return view('/hospital');
                break;
            case '4':
                return view('/diagnostic');
                break;
            default:
                return '/login';
                break;
        }
    }
}
