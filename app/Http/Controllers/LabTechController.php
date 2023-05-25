<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Enums\AppointmentStatus;
use Illuminate\Http\Request;

class LabTechController extends Controller
{
    public function index()
    {
        $appointments=Appointment::latest()->with(['patient'])
                ->Labappointments()
                ->whereNull('user_id')
                ->paginate(5);
        $myAppointments=Appointment::latest()->with(['patient'])
                ->Labappointments()
                ->where('user_id', auth()->id())
                ->paginate(5);

        return view('labtech.dashboard', [
                'appointments'  =>$appointments,
                'myappointments'=>$myAppointments,
        ]);

    }

    public function store(Request $request, Appointment $appointment)
    {
        Appointment::find($request->appointment_id)->update([
                'status'   =>AppointmentStatus::DONE->value,
                'diagonsis'=>$request->diagonsis,
        ]);

        return back();

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

        return view('labtech.show', [
                'appointment'=>$appointment,
                'labreports' =>Appointment::Labappointments()->where('parent_id', $appointment->id)->get(),
        ]);
    }
}
