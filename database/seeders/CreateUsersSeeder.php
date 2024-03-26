<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('11111111'),
            ],

            [
               'name'=>'Pasien1',
               'email'=>'pasien@gmail.com',
               'type'=>0,
               'password'=> bcrypt('11111111'),
            ],

        ];
        
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
