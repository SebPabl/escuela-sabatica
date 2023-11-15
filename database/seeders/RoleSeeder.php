<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name'=> 'admin']);
        $teacher = Role::create(['name' => 'maestro']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.show'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.destroy'])->syncRoles([$admin]); 

        Permission::create(['name' => 'courses.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'courses.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'courses.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'courses.show'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'courses.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'courses.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'courses.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'offerings.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.create'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.store'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.show'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.edit'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.update'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'offerings.destroy'])->syncRoles([$admin, $teacher]);

        Permission::create(['name' => 'students.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.create'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.store'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.show'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.edit'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.update'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'students.destroy'])->syncRoles([$admin, $teacher]);
    }
}