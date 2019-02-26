<?php

namespace App\Http\Controllers;

use App\Models\Leave;

class LeaveController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index()
    {
        $leaves = Leave::getDistinctReasons();
        $reason_types = self::summarize_reasons_graph($leaves);
        
        return view('leave', compact('reason_types'));
    }

        private function summarize_reasons_graph($datas){
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

        foreach ($datas as $data) {
            $item = trim($data->reason_type);
            $cnt = $data->reason_cnt;
            if ($arr && array_key_exists($trans[$item], $arr) == true) {
                $arr[$trans[$item]] += $cnt;
            } else {
                $arr += array($trans[$item]=>$cnt);
                $arr[$trans[$item]] = $cnt;
            }
        }
        return $arr;
    }

}
