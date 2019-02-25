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
        $resigned_marital_statuses = MaritalStatus::getResignedMaritalStatuses();
        $emp_marital_statuses = MaritalStatus::getEmpMaritalStatuses();
	    return view('marital_status', compact('resigned_marital_statuses', 'emp_marital_statuses'));
    }
}
