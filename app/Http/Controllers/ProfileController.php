<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function profile($username)
    {
    	$user = User::whereName($username)->first();
    	if ($user)
    	{
    		return view('user.profile', compact('user'));
    	}
    }
}
