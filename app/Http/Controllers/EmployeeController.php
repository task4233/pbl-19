<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {
	switch ($request->page) {
	  case "Gender":
	    $response_model = Gender::get();
	    return view('gender', ['genders' => $genders]);
	    break;
	}

        $employees = Employee::get();
        return view('employee.index', ['employees' => $employees]);	
    }

    

}

