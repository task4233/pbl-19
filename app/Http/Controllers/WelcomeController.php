<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Employee;

class WelcomeController extends Controller
{
    public function index()
    {
        $resigned_address_list = Leave::getAllAddress();
        $address_list = Employee::getEmployeeAddress();
        return view('welcome', [
            'resigned_address_list' => $resigned_address_list, 
            'address_list' => $address_list
        ]);
    }
}
