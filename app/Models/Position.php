<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = [];

    public static function getResignedPositions(){
        $positions = DB::table('leaves')
                   ->select(DB::raw('count(*) as position_cnt, position'))
                   ->whereNotNull('position')
                   ->whereRaw('position != ""')
                   ->groupBy('position')
                   ->get();
        return $positions;
    }

    public static function getEmpPositions(){
        $positions = DB::table('employees')
                   ->select(DB::raw('count(*) as position_cnt, position'))
                   ->whereNotNull('position')
                   ->whereRaw('position != ""')
                   ->groupBy('position')
                   ->get();
        return $positions;
    }
}
