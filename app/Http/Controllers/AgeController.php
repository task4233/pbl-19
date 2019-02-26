<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Age;

class AgeController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index(){
        $resigned_ages = Age::getResignedAges();
        $emp_ages = Age::getEmpAges();
	    return view('age', compact('resigned_ages', 'emp_ages'));
    }
}
