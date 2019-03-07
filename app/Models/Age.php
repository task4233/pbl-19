<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Age extends Model
{
    protected $table = 'ages';
    protected $fillable = [];

    public static function getResignedAges(){
        $ages = DB::select('SELECT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM leaves WHERE NOT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) ="NULL" GROUP BY age');
        return $ages;
    }

    public static function getEmpAges(){
        $ages = DB::select('SELECT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM employees WHERE NOT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) ="NULL" GROUP BY age');
        return $ages;
    }
}
