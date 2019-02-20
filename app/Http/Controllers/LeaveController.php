<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Gender;

class LeaveController extends Controller
{
    //
    public function __construct()
    {
    
    }

    public function index(Request $request){
    	$params = [
          'page' => $request->get('page', 'reason'), 
	];
	
	//dd($params['page']);
	
    	switch ($params['page']) {
	  case "gender":
	    $genders = Gender::getGenders();
	    return view('gender', ['genders' => $genders]);
	    break;
	  case "reason":

	    $leaves = (new Leave)->getDistinctReasons();
        $arr = [];
        $trans = [
            'CareerPath' => 'Career path',
            'Personal Issues' => 'Personal issues',
            'Working Environment' => 'Working enviroment',
            'Không có lý do thôi việc' => 'No reason',
            'Chuyển môi trường làm việc' => 'Working enviroment',
            'Việc gia đình không thể đi làm tiếp' => 'Family issues',
            'Đi học tiếp' => 'Further education',
            'Sang Nhật làm' => 'Move to JP',
            'Lý do cá nhân' => 'Personal issues',
            'Không phù hợp môi trường' => 'Not suitable',
            'Sang nước ngoài' => 'Going abroad',
            'Về kinh doanh gia đình' => 'Personal bussiness',
            'Thay đổi môi trường' => 'Working enviroment',
            'Start up' => 'Build new company',
            'Nghỉ thực tập' => 'Internship over',
            'Hết thời hạn' => 'Expired',
            'Thay đổi định hướng' => 'Career path',
            'Sang JP Co-well' => 'Move to CW JP',
            'Công ty ko phù hợp với định hướng ban đầu' => 'Career path',
            'Sang CW JP' => 'Move to CW JP',
            'Nghỉ đột xuất' => 'Instant quit'
        ];
        //dd(array_key_exists($trans['Sang CW JP'], $arr));
        foreach ($leaves as $leave) {
            $reason = trim($leave->reason_type);
            $count = $leave->reason_cnt;
            if ($arr && array_key_exists($trans[$reason], $arr) == true) {
               $arr[$trans[$reason]] += $count;
            } else {
               $arr[$trans[$reason]] = $count;
            }
        }        
        return view('leave',['reason_types' => $arr]);
	    //$reason_types = Leave::getDistinctReasons();
	    //return view('leave', ['reason_types' => $reason_types]);
	    break;
	  case "distance":
	    // Still Making...
	    break;
	  default:
	    // redirect to 404 page?
	    break;
	} 
    	$reason_types = Leave::getDistinctReasons();
	// dd($reason_types);
	
	return view('leave', ['reason_types' => $reason_types]);
    }

}
