<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Appointment */
class AppointmentResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
                'id'              =>$this->id,
                'patient_id'      =>$this->patient_id,
                'user_id'         =>$this->user_id,
                'appointment_date'=>$this->appointment_date,
                'ticket_number'   =>$this->ticket_number,
                'doctor_id'       =>$this->doctor_id,
                'status'          =>$this->status,
                'created_at'      =>$this->created_at,
                'updated_at'      =>$this->updated_at,
        ];
    }
}
