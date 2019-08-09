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
        Role::create(['nama_role' => 'sales']);
        Role::create(['nama_role' => 'admin']);
        Role::create(['nama_role' => 'finance']);
        Role::create(['nama_role' => 'management']);
        Role::create(['nama_role' => 'presales']);
        Role::create(['nama_role' => 'PM']);
        Role::create(['nama_role' => 'Administrator']);
        
    }
}
