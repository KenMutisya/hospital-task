<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Patient */
class PatientResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
                'id'           =>$this->id,
                'first_name'   =>$this->first_name,
                'last_name'    =>$this->last_name,
                'date_of_birth'=>$this->date_of_birth,
                'email'        =>$this->email,
                'phone_number' =>$this->phone_number,
                'blood_group'  =>$this->blood_group,
                'sex'          =>$this->sex,
                'address'      =>$this->address,
                'status'       =>$this->status,
                'created_at'   =>$this->created_at,
                'updated_at'   =>$this->updated_at,
        ];
    }
}
