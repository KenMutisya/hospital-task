<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Enums\AppointmentStatus;
use App\Models\Enums\Departments;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $appointments=Appointment::latest()->with(['patient'])
                ->consulations()
                ->whereNull('user_id')
                ->paginate(5);

        $myAppointments=Appointment::latest()->with(['patient'])
                ->consulations()
                ->where('user_id', auth()->id())
                ->paginate(5);

        return view('doctor.dashboard', [
                'appointments'  =>$appointments,
                'myappointments'=>$myAppointments,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function consult(Appointment $appointment)
    {
        if (!isset($appointment->user_id)) {
            $appointment->update([
                    'user_id'=>auth()->id(),
                    'status' =>AppointmentStatus::IN_PROGRESS->value,
            ]);
        }

        $appointment->load('patient');

        return view('doctor.show', [
                'appointment'=>$appointment,
                'labreports' =>Appointment::Labappointments()->where('parent_id', $appointment->id)->get(),
        ]);
    }

    public function labreport(Appointment $appointment)
    {
        Appointment::create([
                'patient_id'      =>$appointment->patient_id,
                'parent_id'       =>$appointment->id,
                'ticket_number'   =>'LR-' . random_int(100, 1000),
                'department'      =>Departments::lab->value,
                'appointment_date'=>now()->addMinute(),
        ]);

        return back();
    }
}
