<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Enums\UserTypes;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
                'name'    =>'Receptionist',
                'email'   =>'receptionist@example.com',
                'type'    =>UserTypes::Receptionist->value,
                'password'=>bcrypt('password'),
        ]);
        User::factory()->create([
                'name'    =>'Doctor',
                'email'   =>'doctor@example.com',
                'type'    =>UserTypes::Doctor->value,
                'password'=>bcrypt('password'),
        ]);
        User::factory()->create([
                'name'    =>'Lab Tech',
                'email'   =>'lab@example.com',
                'type'    =>UserTypes::LabTech->value,
                'password'=>bcrypt('password'),
        ]);
    }
}
