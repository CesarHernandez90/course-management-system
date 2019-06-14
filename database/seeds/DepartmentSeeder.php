<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Ciencias Básicas'
        ]);

        DB::table('departments')->insert([
            'name' => 'Sistemas y Computación'
        ]);

        DB::table('departments')->insert([
            'name' => 'Metalmecánica'
        ]);

        DB::table('departments')->insert([
            'name' => 'Ciencias de la Tierra'
        ]);
    }
}
