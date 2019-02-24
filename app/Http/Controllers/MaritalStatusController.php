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
        $marital_statuses = MaritalStatus::getMaritalStatuses();
	return view('marital_status', ['marital_statuses' => $marital_statuses]);
    }
}
