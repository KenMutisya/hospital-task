<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Enums\AppointmentStatus;
use App\Models\Enums\PatientStatus;
use App\Models\Enums\UserTypes;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_doctor_can_see_upcoming_consultation_appointments()
    {
        $user=User::factory()->create([
                'type'    =>UserTypes::Doctor->value,
                'password'=>bcrypt('password'),
        ]);

        $this->actingAs($user);

        $patient = Patient::factory()->create([
                'first_name' => 'Kennedy',
                'last_name' => 'Mutisya',
        ]);
        $patient->appointments()->create(Appointment::factory()->make([
                'patient_id' => $patient->id
        ])->toArray());

        $this->followingRedirects()->get('/dashboard')->assertSeeText("Kennedy Mutisya");

        $patient->appointments()->each(function($appointment){
            $this->assertSame(AppointmentStatus::PENDING->value,$appointment->status);
        });
    }
}
