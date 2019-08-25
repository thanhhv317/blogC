<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use File;

class ProfileController extends Controller
{
    public function getProfile()
    {
    	$id = Auth::user()->id;
    	$profile = (new Profile)->getData($id);

    	return view('admin.profile.profile')->with('profile', $profile);
    }

    public function postProfile(Request $request)
    {
    	$user_id 	 = Auth::user()->id;
    	$name 		 = $request->name;
    	$facebook	 = $request->facebook;
    	$address 	 = $request->address;
    	$information = $request->information;
    	$code 		 = $request->code;

    	$flag = (new Profile)->getData($user_id);
		
		if (is_null($flag)) {
			if ($code == "notonlyblog") {
				if ($image = $request->file('fImage')) {
		    		$file_name = $image->getClientOriginalName();
		        	$image->move(public_path('/uploads/users'), $file_name);
		    		$profile = (new Profile)->createData($user_id, $address, $facebook, $file_name, $information);
		    	}
		    } else {
		    	return redirect()->back()->with('error','Authentication code incorrect!');
		    }
		} else {
			if ($image = $request->file('fImage')) {
	    		$file_name = $image->getClientOriginalName();
	        	$image->move(public_path('/uploads/users'), $file_name);
	    		$profile = (new Profile)->updateData($user_id, $address, $facebook, $file_name, $information);

		    	$image_path = public_path('/uploads/users/') . $flag->image;
		        if (File::exists($image_path)) {
		            File::delete($image_path);
		        }
	    	} else {
	    		$profile = (new Profile)->updateData($user_id, $address, $facebook, null, $information);
	    	}
		}
    	
    	$user = (new User)->updateName($user_id, $name);

    	return redirect()->back();
    }

}
