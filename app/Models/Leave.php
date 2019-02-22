<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Leave extends Model
{
    protected $table = 'leaves';

    public static function getDistinctReasons()
    {
        $reasons = DB::select('select reason_type, count(*) as reason_cnt from leaves where reason_type is not null group by reason_type');
	
        return $reasons;
    }

    // public static function getReasons(){
    //    $reasons = DB::table('leaves')
    //    		->select(DB::raw('count(*) as reason_cnt, reason_type'))
    // 		// Display Null,too
    // 		// ->whereNotNull('reason_type')
    // 		->groupBy('reason_type')
    // 		->get();
    //    return $reasons;
    // }
}
