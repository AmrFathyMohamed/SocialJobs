<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Social;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Users::factory(20)->create();
        Business::factory(20)->create();
        Social::factory(50)->create();

    }
}
