<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Gender;

class LeaveController extends Controller
{
    //
    public function __construct()
    {
    
    }

    public function index(Request $request){
    	$params = [
		'page' => $request->page, 
	];
	echo "<pre>";
	var_dump($params['page']);
	echo "</pre>";
    	switch ($params['page']) {
	  case "gender":
	    $genders = Gender::getGenders();
	    return view('gender', ['genders' => $genders]);
	    break;
	  case "reason":
	    $reason_types = Leave::getReasons();
	    return view('leave', ['reason_types' => $reason_types]);
	    break;
	  case "distance":
	    // Still Making...
	    break;
	  default:
	    // redirect to 404 page?
	    break;
	} 
    	$reason_types = Leave::getReasons();
	// dd($reason_types);
	
	return view('leave', ['reason_types' => $reason_types]);
    }

}
