<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'institution_name' => 'PT. SUKA MAJU Tbk',
            'person_name' => 'Nike Ardila',
            'position' => 'Staff',
            'department' => 'Human Resource',
            'email' => 'ardila@sukamaju.com',
            'phone_number' => '085635745695'
        ]);
    }
}
