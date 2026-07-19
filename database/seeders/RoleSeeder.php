<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [

            [
                'name' => 'Administrator',
                'description' => 'Full system access',
            ],

            [
                'name' => 'Reception',
                'description' => 'Reception display module',
            ],

            [
                'name' => 'Receptionist',
                'description' => 'Accommodation and guest management',
            ],

            [
                'name' => 'Kitchen',
                'description' => 'Kitchen and meal management',
            ],

            [
                'name' => 'Community Member',
                'description' => 'Resident member',
            ],

            [
                'name' => 'Staff',
                'description' => 'House employee',
            ],

            [
                'name' => 'Guest',
                'description' => 'Guest portal',
            ],

        ];

        foreach ($roles as $role) {

            Role::updateOrCreate(
                ['name' => $role['name']],
                ['description' => $role['description']]
            );

        }
    }
}