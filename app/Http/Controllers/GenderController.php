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
        $genders = Gender::getGenders();
	return view('gender', ['genders' => $genders]);
    }
}
