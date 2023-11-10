<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=> 'Pablo', 
                'email'=> 'pablo@gmail.com', 
                'password'=> Hash::make('12345678'), 
                'role_id'=>'1']];
        DB::table('users')->insert($users);
    }
}
