<?php

namespace App\Http\Controllers;

use App\Course;
use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $selectedPeriod = DB::table('periods')->
        orderBy('id', 'desc')->oldest()->value('id');
        return redirect(route('course.period', $selectedPeriod));
    }

    public function period(Period $period) 
    {
        $selectedPeriod = DB::table('periods')->
        where('id', '=', $period->id)->latest()->get();

        $periods = DB::table('periods')->get();
        $courses = DB::table('courses')->
        where('id_period', '=', $period->id)->
        join('departments', 'courses.id_department', 'departments.id')->
        join('course_types', 'courses.id_course_type', 'course_types.id')->
        join('periods', 'courses.id_period', 'periods.id')->
        join('users', 'courses.id_teacher', 'users.id')->
        select(
            'courses.*',
            'departments.name as department',
            'course_types.name as course_type',
            'periods.name as period',
            'users.name as teacher')->
        get();

        return view('course/index-course',
            compact(['periods', 'courses', 'selectedPeriod']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        return $period;
        /* return view('course/create-course',
            compact(['period'])); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
