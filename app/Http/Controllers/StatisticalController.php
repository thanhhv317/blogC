<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;

class StatisticalController extends Controller
{
    public function getPosts()
    {
    	return view('admin.statistical.list')->with([
    		'title' => 'Article statistics',
    		'profile' => Profile::UserProfile(Auth::user()->id)
    	]);
    }

    public function getComments()
    {
    	return view('admin.statistical.list')->with([
    		'title' => 'Comments statistics',
    		'profile' => Profile::UserProfile(Auth::user()->id)
    	]);
    }
}
