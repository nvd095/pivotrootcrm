<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new \App\Role();
        $role_user->name = 'User';
        $role_user->description = 'System User';
        $role_user->save();
        
        $role_admin = new \App\Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'System Administrator';
        $role_admin->save();
        
        $role_manager = new \App\Role();
        $role_manager->name = 'Event Manager';
        $role_manager->description = 'Event Manager';
        $role_manager->save();
        
        

    }
}
