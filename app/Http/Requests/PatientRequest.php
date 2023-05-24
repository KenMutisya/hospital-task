<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    public function rules()
    {
        return [
                'first_name'   =>['required'],
                'last_name'    =>['required'],
                'date_of_birth'=>['nullable', 'date'],
                'email'        =>['nullable', 'email', 'max:254','unique:patients,email'],
                'phone_number' =>['nullable','unique:patients,phone_number'],
                'blood_group'  =>['nullable'],
                'sex'          =>['nullable'],
                'address'      =>['nullable'],
                'status'       =>['nullable'],
        ];
    }
}
