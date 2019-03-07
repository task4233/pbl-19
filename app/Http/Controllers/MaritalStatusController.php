<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritalStatus;

class MaritalStatusController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index(){
        $resigned_marital_statuses = MaritalStatus::getResignedMaritalStatuses()->sortByDesc('marital_status_cnt');
        $emp_marital_statuses = MaritalStatus::getEmpMaritalStatuses()->sortByDesc('marital_status_cnt');
        $all_emp_cnt = 0;
        $all_resigned_cnt = 0;
        foreach($emp_marital_statuses as $marital_status){
            $all_emp_cnt += $marital_status->marital_status_cnt;
        }
        foreach($resigned_marital_statuses as $marital_status){
            $all_resigned_cnt += $marital_status->marital_status_cnt;
        }
	    return view('marital_status', compact('resigned_marital_statuses', 'emp_marital_statuses', 'all_emp_cnt', 'all_resigned_cnt'));
    }
}
