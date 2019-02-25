<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public static function getEmployeeAddress()
    {
        return self::select('address')->get();
    }
}
