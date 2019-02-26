<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Age extends Model
{
    protected $table = 'ages';
    protected $fillable = [];

    public static function getResignedAges(){
        $ages = DB::select('select TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM leaves GROUP BY age');
        return $ages;
    }

    public static function getEmpAges(){
        $ages = DB::select('select TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM employees GROUP BY age');
        return $ages;
    }
}
