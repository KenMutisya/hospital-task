<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    protected $model=Appointment::class;

    public function definition()
    {
        return [
                'appointment_date'=>Carbon::now(),
                'ticket_number'   =>$this->faker->word(),
        ];
    }
}
