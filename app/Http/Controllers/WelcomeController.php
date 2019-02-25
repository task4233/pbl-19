<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Distance;

class WelcomeController extends Controller
{
    public function index()
    {
        $resigned_address_list = Distance::getResignedPeopleAddresses();
        $address_list = Distance::getEmployeesAddresses();
        return view('welcome', [
            'resigned_address_list' => $resigned_address_list, 
            'address_list' => $address_list
        ]);
    }
}
