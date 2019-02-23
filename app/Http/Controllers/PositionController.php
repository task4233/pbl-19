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
        $positions = Position::getPositions();
        return view('position', ['positions' => $positions]);
    }
}
