<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            'name' => 'Enero - Junio 2019',
            'start' => Date::today(),
            'end' => Date::today(),
            'active' => false
        ]);

        DB::table('periods')->insert([
            'name' => 'Agosto - Diciembre 2019',
            'start' => Date::today(),
            'end' => Date::today(),
            'active' => true
        ]);

        DB::table('courses')->insert([
            'name' => 'Material didáctico: Redes sociales',
            'schedule' => 'Lunes - Viernes de 14-16hrs.',
            'description' => 'Lorem Ipsum dolor',
            'course_type_id' => 2,
            'period_id' => 1,
            'department_id' => 2,
            'teacher_id' => 2
        ]);
    }
}
