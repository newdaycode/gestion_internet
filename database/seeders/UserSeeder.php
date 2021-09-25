<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Luz Galvis',
    		'email' => 'luzlinda11@gmail.com',
    		'password' => bcrypt('12345678'),


    	])->assignRole('admin');

        User::factory(10)->create();
    }
}
