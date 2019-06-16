<?php

namespace App\Http\Controllers;

use App\CourseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseTypeRequest;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursetypes = DB::table('course_types')->paginate(10);
        return view('course_type/index-course-type', compact(['coursetypes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course_type/create-course-type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTypeRequest $request)
    {
        CourseType::create($request->all());
        return redirect()->route('coursetype.index')->
        with('success', 'Tipo de curso agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function show(CourseType $courseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseType $courseType)
    {
        return view('course_type/edit-course-type', compact(['coursetype']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTypeRequest $request, CourseType $courseType)
    {
        $courseType->update($request->all());
        return redirect()->route('coursetype.index')
        ->with('success','Tipo de curso ' . $request->name . ' actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('course_types')->where('id', '=', $request->id)->delete();
        return redirect()->route('coursetype.index')
        ->with('success','Tipo de curso ' . $request->name . ' eliminado satisfactoriamente');
    }
}
