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
        $resigned_genders = Gender::getResignedGenders()->sortByDesc('gender_cnt');
        $emp_genders      = Gender::getEmpGenders()->sortByDesc('gender_cnt');
        
        $all_resigned_cnt = 0;
        $all_emp_cnt = 0;
        foreach ($resigned_genders as $gender){
            $all_resigned_cnt += $gender->gender_cnt;
        }
        foreach ($emp_genders as $gender){
            $all_emp_cnt += $gender->gender_cnt;
        }

        return view('gender', compact('resigned_genders', 'emp_genders', 'all_resigned_cnt', 'all_emp_cnt'));
    }

}
