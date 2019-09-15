<?php

namespace App\Http\Controllers;

use App\Course;
use App\Period;
use App\Auth;
use App\CourseType;
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
        $courseTypes = CourseType::get();
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
            'course_type_id' => $request->course_type_id,
            'period_id' => $request->period_id,
            'department_id' => $request->department_id,
            'teacher_id' => $request->teacher_id
        ]);
        //Course::create($request->all());
        return redirect()->route('course.period', $request->period_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //echo($course);
        $canApply = DB::table('course_profile')->where([
            ['course_id', $course->id,],
            ['profile_id', auth()->user()->profile->id]
        ])->exists();
        $canApply = !$canApply;
        $profiles = $course->profiles;
        //dd($canApply);
        return view('course/show-course', compact(['course', 'canApply', 'profiles']));
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

    public function applyCourse(Course $course)
    {
        /* DB::table('course_vs_profile')->insert([
            'course_id' => $course->id,
            'profile_id' => auth()->user()->profile->id
        ]); */

        $profile_id = auth()->user()->profile->id;
        $course->profiles()->attach($profile_id);

        return redirect()->route('course.show', $course->id)
        ->with('success','Te has suscrito al curso ' 
        . $course->name.'. ¡Felicitaciones!');
    }

    public function leaveCourse(Course $course)
    {
        /* DB::table('course_vs_profile')->where([
            ['course_id', $course->id],
            ['profile_id', auth()->user()->profile->id]
        ])->delete(); */

        $profile_id = auth()->user()->profile->id;
        $course->profiles()->detach($profile_id);

        return redirect()->route('course.show', $course->id)
        ->with('warning','Has abandonado el curso ' . $course->name);
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
