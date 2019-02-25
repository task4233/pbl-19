<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gender extends Model
{
    protected $table = 'genders';
    protected $fillable = [];

    public static function getResignedGenders(){
    	$genders = DB::table('leaves')
                 ->select(DB::raw('count(*) as gender_cnt, gender'))
                 ->whereNotNull('gender')
                 ->whereRaw('gender != ""')
                 ->groupBy('gender')
                 ->get();
        return $genders;
    }

    public static function getEmpGenders(){
    	$genders = DB::table('employees')
                 ->select(DB::raw('count(*) as gender_cnt, gender'))
                 ->whereNotNull('gender')
                 ->whereRaw('gender != ""')
                 ->groupBy('gender')
                 ->get();
        return $genders;
    }
}
