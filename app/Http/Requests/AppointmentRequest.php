<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function rules()
    {
        return [
                'patient_id'      =>['nullable', 'integer'],
                'user_id'         =>['nullable'],
                'appointment_date'=>['required', 'date'],
                'ticket_number'   =>['required'],
                'doctor_id'       =>['nullable'],
                'status'          =>['nullable'],
        ];
    }
}
