<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Arshad',
        //     'email' => 'arssshu@gmail.com',
        //     'dob' => '1995-04-08'
           
        // ]);
        // User::create([
        //     'name' => 'Banu',
        //     'email' => 'banu@gmail.com',
        //     'dob' => '1995-04-08'
          
        // ]);
        User::create([
         
            'name' => 'Kiran',
            'email' => 'kiran@gmail.com',
            'dob' => '1995-04-08',
            'password' => bcrypt('shabanu'),
            'status' => 1
           
        ]);
       // User::factory()->count(100)->create();
    }
}
