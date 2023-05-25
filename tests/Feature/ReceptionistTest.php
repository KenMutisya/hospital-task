<?php

namespace Tests\Feature;

use App\Events\PatientSavedEvent;
use App\Models\Enums\PatientStatus;
use App\Models\Enums\UserTypes;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReceptionistTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * */
    public function _a_receptionist_can_add_a_patient()
    {
        $user=User::factory()->create([
                'type'    =>UserTypes::Receptionist->value,
                'password'=>bcrypt('password'),
        ]);

        $this->actingAs($user);

       $response = $this->post(route('patient.store'), [
                'first_name'   =>$firstname=$this->faker->firstName(),
                'last_name'    =>$lastname=$this->faker->lastName(),
                'date_of_birth'=>$this->faker->date(),
                'email'        =>$email=$this->faker->email(),
                'phone_number' =>$phonenumber=$this->faker->phoneNumber(),
                'blood_group'  =>$this->faker->bloodGroup(),
                'sex'          =>$this->faker->randomElement(['Male', 'Female']),
                'address'      =>$this->faker->address(),
                'status'       =>$this->faker->randomElement([
                        PatientStatus::Active->value,
                        PatientStatus::Inactive->value,
                ]),
        ]);

        $this->assertDatabaseHas(Patient::class, [
                'email'       =>$email,
                'phone_number'=>$phonenumber,
        ]);
    }

    /**
     * @test
     * */
    public function a_receptionist_can_add_a_patient_and_a_ticket_is_automatically_generated()
    {
        \Event::fake();
        $user=User::factory()->create([
                'type'    =>UserTypes::Receptionist->value,
                'password'=>bcrypt('password'),
        ]);

        $this->actingAs($user);

       $response = $this->post(route('patient.store'), [
                'first_name'   =>$firstname=$this->faker->firstName(),
                'last_name'    =>$lastname=$this->faker->lastName(),
                'date_of_birth'=>$this->faker->date(),
                'email'        =>$email=$this->faker->email(),
                'phone_number' =>$phonenumber=$this->faker->phoneNumber(),
                'blood_group'  =>$this->faker->bloodGroup(),
                'sex'          =>$this->faker->randomElement(['Male', 'Female']),
                'address'      =>$this->faker->address(),
                'status'       =>$this->faker->randomElement([
                        PatientStatus::Active->value,
                        PatientStatus::Inactive->value,
                ]),
        ]);

        $this->assertDatabaseHas(Patient::class, [
                'email'       =>$email,
                'phone_number'=>$phonenumber,
        ]);

        \Event::assertDispatched(PatientSavedEvent::class);
    }
}
