<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=> 'Administrator',
            'email'=> 'administrator@mib.com',
            'role_id'=> '7',
            'password'=> Hash::make('Mib1234;')
        ]);
    }
}
