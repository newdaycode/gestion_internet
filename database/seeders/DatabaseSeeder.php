<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitud;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Solicitud::factory(5)->create();

    }
}
