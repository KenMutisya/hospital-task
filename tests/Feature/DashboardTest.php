<?php

namespace Tests\Feature;

use App\Models\Enums\UserTypes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_receptionist_is_redirected_to_the_proper_dashboard()
    {

        $user=User::factory()->create([
                'type'    =>UserTypes::Receptionist->value,
                'password'=>bcrypt('password'),
        ]);

        $response=$this->followingRedirects()->post('/login', [
                'email'   =>$user->email,
                'password'=>'password',
        ]);

        $response->assertViewIs('receptionist.dashboard');
        $response->assertSeeText("Add a New Patient");

    }

    public function test_a_doctor_is_redirected_to_the_proper_dashboard()
    {

        $user=User::factory()->create([
                'type'    =>UserTypes::Doctor->value,
                'password'=>bcrypt('password'),
        ]);

        $response=$this->followingRedirects()->post('/login', [
                'email'   =>$user->email,
                'password'=>'password',
        ]);

        $response->assertViewIs('doctor.dashboard');
        $response->assertSeeText("Upcoming Appointments");

    }

    public function test_a_labtech_is_redirected_to_the_proper_dashboard()
    {

        $user=User::factory()->create([
                'type'    =>UserTypes::LabTech->value,
                'password'=>bcrypt('password'),
        ]);

        $response=$this->followingRedirects()->post('/login', [
                'email'   =>$user->email,
                'password'=>'password',
        ]);

        $response->assertViewIs('labtech.dashboard');
        $response->assertSeeText("Upcoming Appointments");

    }
}
