<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MaritalStatus extends Model
{
    protected $table = 'marital_statuses';
    protected $fillable = [];

    public static function getMaritalStatuses(){
    	$marital_statuses = DB::table('leaves')
                 ->select(DB::raw('count(*) as marital_status_cnt, marital_status'))
                 ->whereNotNull('marital_status')
                 ->whereRaw('marital_status != ""')
                 ->groupBy('marital_status')
                 ->get();
        return $marital_statuses;
    }
}
