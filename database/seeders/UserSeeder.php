<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [
        //     [
        //         'name'=> 'PabloS', 
        //         'email'=> 'pabloS@gmail.com', 
        //         'password'=> Hash::make('12345678'),
        //     ]
        // ];
        User::create([
            'name'=> 'PabloS', 
            'email'=> 'pabloS@gmail.com', 
            'password'=> Hash::make('12345678'),
        ])->assignRole('admin');
    }
}
