<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [['name'=>'cuna'],['name'=>'infantes'],['name'=>'primarios'],['name'=>'intermediarios'],['name'=>'juveniles']];
        DB::table('courses')->insert($courses);
    }
}
