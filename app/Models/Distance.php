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
                       ->whereNotNull('address')
                       ->whereRaw('address != ""')
                       ->groupBy('address')
                       ->get();
    }

    // get addresses of resigned people
    public static function getResignedPeopleAddresses(){
        $resigned_people_addresses = DB::table('leaves')
                                   ->whereNotNull('address')
                                   ->whereRaw('address != ""')
                                   ->groupBy('address')
                                   ->get();
        return $resinged_people_addresses;
    }

}
