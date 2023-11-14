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

        $admin = Role::create(['name'=>'admin']);
        $teacher = Role::create(['name'=> 'teacher']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.show'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'user.destroy'])->syncRoles([$admin]);     
    }
}