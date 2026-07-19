<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            [
                'role' => 'Administrator',
                'first_name' => 'System',
                'last_name' => 'Administrator',
                'email' => 'admin@loyola.test',
            ],

            [
                'role' => 'Receptionist',
                'first_name' => 'Mary',
                'last_name' => 'Reception',
                'email' => 'reception@loyola.test',
            ],

            [
                'role' => 'Kitchen',
                'first_name' => 'Peter',
                'last_name' => 'Kitchen',
                'email' => 'kitchen@loyola.test',
            ],

            [
                'role' => 'Community Member',
                'first_name' => 'John',
                'last_name' => 'Member',
                'email' => 'member@loyola.test',
            ],

            [
                'role' => 'Staff',
                'first_name' => 'James',
                'last_name' => 'Staff',
                'email' => 'staff@loyola.test',
            ],

            [
                'role' => 'Guest',
                'first_name' => 'Joseph',
                'last_name' => 'Guest',
                'email' => 'guest@loyola.test',
            ],

        ];

        foreach ($users as $data) {

            $role = Role::where('name', $data['role'])->first();

            if (!$role) {
                $this->command->warn("Role '{$data['role']}' not found.");
                continue;
            }

            User::updateOrCreate(

                ['email' => $data['email']],

                [
                    'role_id' => $role->id,
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'password' => Hash::make('password'),
                    'is_active' => true,
                ]

            );
        }

        $this->command->info('Test users created successfully.');
    }
}