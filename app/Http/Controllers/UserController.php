<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use App\Profile;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        /* foreach ($users as $user) {
            echo($user->profile->name);
        } */
        return view('user/index-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->name = 'El nombre';
        $profile->save();

        $user = new User;
        $user->email = 'elcorreo@gmail.com';
        $user->password = bcrypt('12345678');
        $user->profile_id = $profile->id;
        $user->save();

        //User::create($request->all());
        return redirect()->route('user.index')->
        with('success', 'Usuario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $departments = Department::get();
        return view('user/edit-user', compact(['user', 'departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $profile = Profile::find($user->profile_id);
        $profile->department_id = $request->department_id;
        $profile->name = $request->name;
        $profile->save();

        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.index')
        ->with('success','Usuario <a href="' 
        . route('user.edit', $user) 
        . '" class="alert-link">' 
        . $request->name 
        .'</a> ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();
        return redirect()->route('user.index')
        ->with('success','Usuario ' . $request->name . ' eliminado satisfactoriamente');
    }
}
