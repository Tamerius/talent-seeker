<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = Application::create($request->all());

        if (User::where('email', $request->email)->first())
        {
            // known user
            $user = User::where('email', $request->email)->first();
        }
        else {
            // new user
            $user = User::create($request->all());
            $user->admin = false;
            $user->save();
        }

        $application->user_id = $user->id;
        $application->save();

        $applications = Application::all();
        return view('/home', compact('applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::where('id', $id)->firstOrFail();
        
        if (Auth::user()->admin == 0)
        {
            // non admin
            if ($application->user_id != Auth::user()->id)
                // illegal
                return;
        }
        else
        {
            // admin
            $application->views = $application->views + 1;
            $application->save();
        }

        return view('/applications/show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
