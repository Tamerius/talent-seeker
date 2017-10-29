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

        // weekdays available filter
        if (isset($request['daysAvailable']) && $request['daysAvailable'] != null)
        {
            $filter = array_merge($filter, [['daysAvailable', '=', $request->daysAvailable]]);
        }

        // years of experience filter
        if (isset($request['yearsExperience']) && $request['yearsExperience'] != null)
        {
            $filter = array_merge($filter, [['yearsExperience', '=', $request->yearsExperience]]);
        }

        // Hired filter
        if (isset($request['hired']) && $request['hired'] != null)
        {
            if ($request['hired'] != 'all')
            {
                $filter = array_merge($filter, [['hired', '=', $request->hired]]);
            }
        }
        else
        {
            // default
            $filter = array_merge($filter, [['hired', '=', 'pending']]);
        }

        // non admin filter
        if (Auth::user()->admin == 0)
        {
            $filter = array_merge($filter, [['user_id', '=', Auth::user()->id]]);
        }

        $applications = Application::where($filter)->paginate(4);

        return view('home', compact('applications', 'request'));
    }
}
