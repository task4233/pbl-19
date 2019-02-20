<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Leave extends Model
{
    protected $table = 'leaves';

    public function getDistinctReason()
    {
        return DB::select('select reason_type, count(*) as cnt from leaves where reason_type is not null group by reason_type');
    }
}
