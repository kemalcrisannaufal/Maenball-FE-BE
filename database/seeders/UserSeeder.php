<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'  => 'kemal',
            'email' => 'kemal@gmail.com',
            'password' => bcrypt('kemal'),
            'created_at' => now(),
            'updated_at' => now()],

            ['name'  => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'created_at' => now(),
            'updated_at' => now()],

            ['name'  => 'guest',
            'email' => 'guest@gmail.com',
            'password' => bcrypt('guest'),
            'created_at' => now(),
            'updated_at' => now()],
        ];

        foreach ($data as $value) {
            User::insert(
                [
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => $value['password'],
                    'created_at' => $value['created_at'],
                    'updated_at' => $value['updated_at'],
                ]
            );
        }
    }
}
