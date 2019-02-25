<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index(){
        $resigned_genders = Gender::getResignedGenders();
        $emp_genders      = Gender::getEmpGenders();

        

        return view('gender', compact('resigned_genders', 'emp_genders'));
    }
}
