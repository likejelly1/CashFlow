<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'Hardwares']);
        Category::create(['name'=>'Software Licenses']);
        Category::create(['name'=>'Application Licenses']);
        Category::create(['name'=>'MIBs Solutions']);
        Category::create(['name'=>'MIBs Profesional Services']);
        Category::create(['name'=>'MIBs Maintenance Services']);
        
        
    }
}
