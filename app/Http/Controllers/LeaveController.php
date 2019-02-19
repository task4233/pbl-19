<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    //
    public function __construct()
    {
    
    }

    public function index(){
    	$reason_types = Leave::getReasons();
	// dd($reason_types);
	return view('leave', ['reason_types' => $reason_types]);
    }

}
