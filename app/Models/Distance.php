<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Distance extends Model
{
    protected $table = 'distances';
    protected $fillable = [];

    // get addresses of employees
    public static function getEmployeesAddresses() {
        $emp_addresses = DB::table('employees')
                       ->select('address')
                       ->whereNotNull('address')
                       ->whereRaw('address != ""')
                       ->get();
        return $emp_addresses;
    }

    // get addresses of resigned people
    public static function getResignedPeopleAddresses(){
        $resigned_people_addresses = DB::table('leaves')
                                   ->select('address')
                                   ->whereNotNull('address')
                                   ->whereRaw('address != ""')
                                   ->get();
        return $resigned_people_addresses;
    }

}
