<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'name' => 'Formación',
            'description' => 'Cursos para la formación docente'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Actualización',
            'description' => 'Cursos para la actualización docente'
        ]);
    }
}
