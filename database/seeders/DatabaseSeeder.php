<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(){
    \App\Models\User::factory()->create([
        'name'=>'Admin ONG','email'=>'admin@petrescue.test','password'=>bcrypt('password')
    ]);
    \App\Models\Animal::factory(12)->create();
}


        
    }


