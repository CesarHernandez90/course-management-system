<?php

namespace App\Http\Controllers;

use App\Course;
use App\Period;
use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;

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
        $courseTypes = DB::table('course_types')->get();
        $teachers = DB::table('users')->
        where('id_department', '=', auth()->user()->id_department)->get();
        return view('course/create-course',
            compact(['period', 'courseTypes', 'teachers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/share/course/', $name);
        }

        DB::table('courses')->insert([
            'name' => $request->name,
            'schedule' => $request->schedule,
            'description' => $request->description,
            'img' => $name,
            'id_course_type' => $request->id_course_type,
            'id_period' => $request->id_period,
            'id_department' => $request->id_department,
            'id_teacher' => $request->id_teacher
        ]);

        return redirect()->route('course.period', $request->id_period);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        echo($course);
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
