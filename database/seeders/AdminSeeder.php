<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678')
            ]
        );
        User::firstOrCreate(
            ['email' => 'ethereal@admin.com'],
            [
                'name' => "E'thereal",
                'password' => Hash::make('12345678')
            ]
        );
    }
}
