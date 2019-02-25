<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $resigned_positions = Position::getResignedPositions();
        $emp_positions      = Position::getEmpPositions();
        return view('position', compact('resigned_positions', 'emp_positions'));
    }
}
