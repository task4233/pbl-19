<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = [];

    public static function getPositions(){
        $positions = DB::table('leaves')
                   ->select(DB::raw('count(*) as position_cnt, position'))
                   ->whreNotNull('position')
                   ->groupBy('position')
                   ->get();
        return $positions;
    }
    
}
