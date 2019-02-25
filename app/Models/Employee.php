<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Employee extends Model
{
    //
    public static function getEmployeeAddress()
    {
        dd(DB::select('address from employees where length(`address`) > 0')->get());
        return DB::select('address from employees where LENGTH(address) > 0')->get();
    }
}
