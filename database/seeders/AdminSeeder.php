<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'  => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now()],
        ];

        foreach ($data as $value) {
            Admin::insert(
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
