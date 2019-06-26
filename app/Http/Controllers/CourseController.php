<?php

namespace App\Http\Controllers;

use App\Course;
use App\Period;
use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use App\Profile;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $period = Period::first();
        return redirect(route('course.period', $period));
    }

    public function period(Period $fatherPeriod) 
    {
        $courses = Course::where('period_id', $fatherPeriod->id)->get();
        $periods = Period::get();
        //$fatherPeriod = $period;

        return view('course/index-course',
            compact(['periods', 'courses', 'fatherPeriod']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $fatherPeriod)
    {
        $courseTypes = Course::get();
        $teachers = Profile::where('department_id', auth()->user()->profile->department_id)->get();
        return view('course/create-course',
            compact(['fatherPeriod', 'courseTypes', 'teachers']));
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
