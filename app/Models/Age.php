<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

<<<<<<< HEAD
class Age extends Model
=======
class Gender extends Model
>>>>>>> 59f2a2ab32e4d2e63dbf9038805cc142fd93281a
{
    protected $table = 'ages';
    protected $fillable = [];

    public static function getResignedAges(){
<<<<<<< HEAD
        $ages = DB::select('select TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM leaves GROUP BY age');
=======
        $ages = DB::table('leaves')
                 ->select(DB::raw('TIMESTAMPDIFF(YEAR, birthday, CURDATE() AS age'))
                 ->select(DB::raw('count(*) as age_cnt, age'))
                 ->whereNotNull('age')
                 ->whereRaw('age != ""')
                 ->groupBy('age')
                 ->get();
>>>>>>> 59f2a2ab32e4d2e63dbf9038805cc142fd93281a
        return $ages;
    }

    public static function getEmpAges(){
<<<<<<< HEAD
        $ages = DB::select('select TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age, COUNT(*) AS age_cnt FROM employees GROUP BY age');
=======
        $ages = DB::table('employees')
                 ->select(DB::raw('TIMESTAMPDIFF(YEAR, birthday, CURDATE() AS age'))
                 ->select(DB::raw('count(*) as age_cnt, age'))
                 ->whereNotNull('age')
                 ->whereRaw('age != ""')
                 ->groupBy('age')
                 ->get();
>>>>>>> 59f2a2ab32e4d2e63dbf9038805cc142fd93281a
        return $ages;
    }
}
