<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'gender' => 'male',
                'image' => 'd-male.png',
                'password' => '$2y$10$ifvya9m/bF56GCYBcvV35OHp4XKkYpHx0alIaK6qYAsd.DG2BB4Ha',
                'role_id' => 1,
                'is_active' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'name' => 'Member',
                'email' => 'member@gmail.com',
                'gender' => 'female',
                'image' => 'd-female.png',
                'password' => '$2y$10$E0YSLvpBRXcSmcDO1B1XgOZrYV9YNZCbfa6jU1hqA51pu2hXOf3Ny',
                'role_id' => 2,
                'is_active' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]

        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
