<?php

namespace Database\Factories;

use App\Models\Enums\Gender;
use App\Models\Enums\PatientStatus;
use App\Models\Enums\UserTypes;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model=Patient::class;

    public function definition()
    {
        return [
                'first_name'   =>$this->faker->firstName,
                'last_name'    =>$this->faker->lastName,
                'date_of_birth'=>$this->faker->dateTimeThisDecade,
                'email'        =>$this->faker->safeEmail,
                'phone_number' =>$this->faker->phoneNumber,
                'blood_group'  =>$this->faker->bloodGroup(),
                'sex'          =>$this->faker->randomElement([
                        Gender::MALE->value, Gender::FEMALE->value,
                ]),
                'address'      =>$this->faker->address,
                'status'       =>$this->faker->randomElement([
                        PatientStatus::Active->value, PatientStatus::Inactive->value,
                ]),
        ];
    }
}
