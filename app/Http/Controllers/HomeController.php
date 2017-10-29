<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = [];

        // weekdays available
        if (isset($request['daysAvailable']) && $request['daysAvailable'] != null)
        {
            $filter = array_merge($filter, [['daysAvailable', '=', $request->daysAvailable]]);
        }

        // years of experience
        if (isset($request['yearsExperience']) && $request['yearsExperience'] != null)
        {
            $filter = array_merge($filter, [['yearsExperience', '=', $request->yearsExperience]]);
        }

        // non admin
        if (Auth::user()->admin == 0)
        {
            $filter = array_merge($filter, [['user_id', '=', Auth::user()->id]]);
        }

        $applications = Application::where($filter)->get();

        return view('home', compact('applications', 'request'));
    }
}
