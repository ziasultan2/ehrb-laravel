<?php

namespace App\Http\Controllers;

use App\models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\models\Doctor;
use App\models\MedicineList;
use App\models\Test;
use App\models\TestLists;
use App\Services\DoctorAppointmentService;

class DoctorAppointmentController extends Controller
{
    /** @var DoctorAppointmentService  */
    private $doctorAppointmentService;

    public function __construct(DoctorAppointmentService $doctorAppointmentService)
    {
        $this->doctorAppointmentService = $doctorAppointmentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hello\n world';
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
        return $this->doctorAppointmentService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = TestLists::all();
        $medicine = MedicineList::all();

        return view('doctor.appointment_details', compact(['test', 'medicine']));
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
