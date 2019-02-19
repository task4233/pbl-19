<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function getLeaves()
    {
	$leaves = DB::table('leaves');
    }
}
