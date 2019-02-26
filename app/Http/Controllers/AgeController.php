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
        $all_emp_cnt = 0;
        $all_resigned_cnt = 0;
      
        $resigned_ages = Age::getResignedAges();
        $resigned_result = [
            '(0, 25]' => 0, 
            '(25, 30]' => 0, 
            '(30, 35]' => 0, 
            '(35, inf]' => 0, 
        ];
        foreach ($resigned_ages as $item) {
            if ($item->age <= 25) {
                $resigned_result['(0, 25]'] += $item->age_cnt;
            }  else if ($item->age > 25 && $item->age <= 30) {
                $resigned_result['(25, 30]'] += $item->age_cnt;
            } else if ($item->age > 30 && $item->age <= 35) {
                $resigned_result['(30, 35]'] += $item->age_cnt;
            } else if ($item->age > 35) {
                $resigned_result['(35, inf]'] += $item->age_cnt;
            }
            $all_resigned_cnt += $item->age_cnt;
        }
        $emp_ages = Age::getEmpAges();
        $emp_result = [
            '(0, 25]' => 0, 
            '(25, 30]' => 0, 
            '(30, 35]' => 0, 
            '(35, inf]' => 0, 
        ];
        foreach ($emp_ages as $item) {
            if ($item->age <= 25) {
                $emp_result['(0, 25]'] += $item->age_cnt;
            }  else if ($item->age > 25 && $item->age <= 30) {
                $emp_result['(25, 30]'] += $item->age_cnt;
            } else if ($item->age > 30 && $item->age <= 35) {
                $emp_result['(30, 35]'] += $item->age_cnt;
            } else if ($item->age > 35) {
                $emp_result['(35, inf]'] += $item->age_cnt;
            }
            $all_emp_cnt += $item->age_cnt;
        }
       
	    return view('age', compact('resigned_result', 'all_resigned_cnt', 'emp_result', 'all_emp_cnt'));
    }
}
