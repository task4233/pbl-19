<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leave;

class WelcomeController extends Controller
{
    public function index()
    {
        $address_list = Leave::getAllAddress();
        return view('welcome', [
            'address_list' => $address_list
        ]);
    }
}
