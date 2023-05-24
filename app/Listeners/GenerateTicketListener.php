<?php

namespace App\Listeners;

use App\Events\PatientSavedEvent;
use App\Models\Appointment;
use App\Models\User;

class GenerateTicketListener
{
    public function __construct()
    {
    }

    public function handle(PatientSavedEvent $event)
    {
        $this->generateAppointment($event);
    }

    private function generateAppointment(PatientSavedEvent $event)
    {
        return Appointment::create([
                'patient_id'      =>$event->patient->id,
                'ticket_number'   =>random_int(100, 1000),
                'appointment_date'=>now()->addMinute(),
                'department'      =>'consultation',
        ]);
    }
}
