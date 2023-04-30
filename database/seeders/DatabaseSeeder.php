<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Social;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Users::factory()->create([
            'FullName' => 'Admin',
            'ProfilePhoto' => '',
            'PhoneNumber' => '000-000-000',
            'Email' => 'admin@admin.com',
            'Password' => Hash::make('admin123'),
            'IsAdmin' => 1,
            'Link' => 'Admin'
        ]);

        Users::factory(20)->create();
        Business::factory(20)->create();
        Social::factory(50)->create();

    }
}