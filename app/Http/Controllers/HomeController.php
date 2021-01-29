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
            case 'user':
                return view('home');
                break;
            case 'doctor':
                $appointments = $this->appointmentService->getDoctorAppointment();
                return view('doctor.appointment', compact('appointments'));
                break;
            case 'diagnostic_center':
                return view('/hospital');
                break;
            case 'admin':
                return view('admin.admin');
                break;
            default:
                return '/login';
                break;
        }
    }
}
