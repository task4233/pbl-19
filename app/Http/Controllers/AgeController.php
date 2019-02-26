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
        $resigned_result = [
            'range1' => 0, 
            'range2' => 0, 
            'range3' => 0, 
            'range4' => 0, 
            
        ];
        foreach ($resigned_ages as $item) {
            if ($item->age <= 25) {
                $resigned_result['range1'] += $item->age_cnt;
            }  else if ($item->age > 25 && $item->age <= 30) {
                $resigned_result['range2'] += $item->age_cnt;
            } else if ($item->age > 30 && $item->age <= 35) {
                $resigned_result['range3'] += $item->age_cnt;
            } else if ($item->age > 35) {
                $resigned_result['range4'] += $item->age_cnt;
            }
        }
        $emp_ages = Age::getEmpAges();
        $emp_result = [
            'range1' => 0, 
            'range2' => 0, 
            'range3' => 0, 
            'range4' => 0, 
            
        ];
        foreach ($emp_ages as $item) {
            if ($item->age <= 25) {
                $emp_result['range1'] += $item->age_cnt;
            }  else if ($item->age > 25 && $item->age <= 30) {
                $emp_result['range2'] += $item->age_cnt;
            } else if ($item->age > 30 && $item->age <= 35) {
                $emp_result['range3'] += $item->age_cnt;
            } else if ($item->age > 35) {
                $emp_result['range4'] += $item->age_cnt;
            }
        }
	    return view('age', compact('resigned_result', 'emp_result'));
    }
}
