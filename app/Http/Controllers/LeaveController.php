<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $leaves = Leave::getDistinctReasons();
        $arr = [];
        $trans = [
            'CareerPath' => 'Going abroad',
            'Personal Issues' => 'Personal issues',
            'Working Environment' => 'Working environment',
            'Không có lý do thôi việc' => 'No reason',
            'Chuyển môi trường làm việc' => 'Working environment',
            'Việc gia đình không thể đi làm tiếp' => 'Personal issues',
            'Đi học tiếp' => 'Personal issues',
            'Sang Nhật làm' => 'Going abroad',
            'Lý do cá nhân' => 'Personal issues',
            'Không phù hợp môi trường' => 'Working environment',
            'Sang nước ngoài' => 'Going abroad',
            'Về kinh doanh gia đình' => 'Personal business',
            'Thay đổi môi trường' => 'Working environment',
            'Start up' => 'Personal business',
            'Nghỉ thực tập' => 'Internship over',
            'Hết thời hạn' => 'Expired',
            'Thay đổi định hướng' => 'Going abroad',
            'Sang JP Co-well' => 'Going abroad',
            'Công ty ko phù hợp với định hướng ban đầu' => 'Going abroad',
            'Sang CW JP' => 'Going abroad',
            'Nghỉ đột xuất' => 'Personal issues'
        ];
        //dd(array_key_exists($trans['Sang CW JP'], $arr));
        foreach ($leaves as $leave) {
            $reason = trim($leave->reason_type);
            $count = $leave->reason_cnt;
            if ($arr && array_key_exists($trans[$reason], $arr) == true) {
                $arr[$trans[$reason]] += $count;
            } else {
                $arr += array($trans[$reason]=>$count);
                $arr[$trans[$reason]] = $count;
            }
        }
        return view('leave', ['reason_types' => $arr]);
    }
}
