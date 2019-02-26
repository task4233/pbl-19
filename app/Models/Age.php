<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gender extends Model
{
    protected $table = 'ages';
    protected $fillable = [];

    public static function getResignedAges(){
        $ages = DB::table('leaves')
                 ->select(DB::raw('TIMESTAMPDIFF(YEAR, birthday, CURDATE() AS age'))
                 ->select(DB::raw('count(*) as age_cnt, age'))
                 ->whereNotNull('age')
                 ->whereRaw('age != ""')
                 ->groupBy('age')
                 ->get();
        return $ages;
    }

    public static function getEmpAges(){
        $ages = DB::table('employees')
                 ->select(DB::raw('TIMESTAMPDIFF(YEAR, birthday, CURDATE() AS age'))
                 ->select(DB::raw('count(*) as age_cnt, age'))
                 ->whereNotNull('age')
                 ->whereRaw('age != ""')
                 ->groupBy('age')
                 ->get();
        return $ages;
    }
}
