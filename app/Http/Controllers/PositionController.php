<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\Position;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        // normal graph
        $resigned_positions = Position::getResignedPositions();
        self::fill_resigned_data($resigned_positions);
        $avg_resigned_positions = self::get_avg($resigned_positions);
        // $summarized_resigned_positions = self::summarize_positions_graph($resigned_positions);

        $emp_positions      = Position::getEmpPositions();
        self::fill_emp_data($emp_positions);
        $avg_emp_positions = self::get_avg($emp_positions);
        //dd($avg_resigned_positions);
        // $summarized_emp_positions = self::summarize_positions_graph($emp_positions);

        // summarized graph

        $resigned_positions_short = [
            'fresher' => 0,
            'junior' => 0,
            'senior' => 0,
            'leader' => 0,
            'expert' => 0,
            'manager' => 0,
            'other' => 0
        ];
        $emp_positions_short = $resigned_positions_short;
        foreach ($resigned_positions as $item) {
            $pos = $item->position;
            $counter =  $item->position_cnt;
            // $temp[$pos] = $pos_cnt;
            if (Str::contains($pos, 'Fresher') || Str::contains($pos, 'fresher')) {
                $resigned_positions_short['fresher'] += $counter;
            } else if (Str::contains($pos, 'junior') || Str::contains($pos, 'Junior')) {
                $resigned_positions_short['junior'] += $counter;
            } else if (Str::contains($pos, 'senior') || Str::contains($pos, 'Senior')) {
                $resigned_positions_short['senior'] += $counter;
            } else if (Str::contains($pos, 'leader') || Str::contains($pos, 'Leader')) {
                $resigned_positions_short['leader'] += $counter;
            } else if (Str::contains($pos, 'expert') || Str::contains($pos, 'Expert')) {
                $resigned_positions_short['expert'] += $counter;
            } else if (Str::contains($pos, 'PM') || Str::contains($pos, 'DM') || Str::contains($pos, 'Manager')) {
                $resigned_positions_short['manager'] += $counter;
            } else {
                $resigned_positions_short['other'] += $counter;
            } 
        }
        foreach ($emp_positions as $item) {
            $pos = $item->position;
            $counter =  $item->position_cnt;
            // $temp[$pos] = $pos_cnt;
            if (Str::contains($pos, 'Fresher') || Str::contains($pos, 'fresher')) {
                $emp_positions_short['fresher'] += $counter;
            } else if (Str::contains($pos, 'junior') || Str::contains($pos, 'Junior')) {
                $emp_positions_short['junior'] += $counter;
            } else if (Str::contains($pos, 'senior') || Str::contains($pos, 'Senior')) {
                $emp_positions_short['senior'] += $counter;
            } else if (Str::contains($pos, 'leader') || Str::contains($pos, 'Leader')) {
                $emp_positions_short['leader'] += $counter;
            } else if (Str::contains($pos, 'expert') || Str::contains($pos, 'Expert')) {
                $emp_positions_short['expert'] += $counter;
            } else if (Str::contains($pos, 'PM') || Str::contains($pos, 'DM') || Str::contains($pos, 'Manager')) {
                $emp_positions_short['manager'] += $counter;
            } else {
                $emp_positions_short['other'] += $counter;
            } 
        }
        return view('position', compact('resigned_positions_short', 'avg_resigned_positions', 'emp_positions_short'));
    }

    private function collection_insert(&$collection, $position, $insert)
    {
        $after_slice = $collection->splice($position);
        $collection->push($insert);
        foreach ($after_slice as $ai){
            $collection->push($ai);
        }
    }

    private function fill_resigned_data(&$resigned_positions){
        // Expert Designer
        self::collection_insert($resigned_positions, 5,(object)[
            "position_cnt" => 0,
            "position" => "Expert QAT",
        ]);

        // Project Leader
        self::collection_insert($resigned_positions, 17, (object)[
            "position_cnt" => 0,
            "position" => "Project Leader"
        ]);
        
        // SA
        self::collection_insert($resigned_positions, 19, (object)[
            "position_cnt" => 0,
            "position" => "SA"
        ]);

        // Senior QAL
        self::collection_insert($resigned_positions, 23, (object)[
            "position_cnt" => 0,
            "position" => "Senior QAL"
        ]);
    }

    private function fill_emp_data(&$emp_positions){        
        // Expert Designer
        self::collection_insert($emp_positions, 3, (object)[
            "position_cnt" => 0,
            "position" => "Expert Designer"
        ]);
        
        // Junior product manager
        self::collection_insert($emp_positions, 10, (object)[
            "position_cnt" => 0,
            "position" => "Junior product manager"
        ]);

        // Junior QAE
        self::collection_insert($emp_positions, 11, (object)[
            "position_cnt" => 0,
            "position" => "Junior QAE"
        ]);

        // PM
        self::collection_insert($emp_positions, 14, (object)[
            "position_cnt" => 0,
            "position" => "PM"
        ]);

        // PM - New
        self::collection_insert($emp_positions, 15, (object)[
            "position_cnt" => 0,
            "position" => "PM - New"
        ]);

        // Senior QASE
        self::collection_insert($emp_positions, 22, (object)[
            "position_cnt" => 0,
            "position" => "Senior QASE"
        ]);

        // Tec-Specialist
        self::collection_insert($emp_positions, 26, (object)[
            "position_cnt" => 0,
            "position" => "Tec-Specialist"
        ]);
    }

    private function summarize_positions_graph($datas){
        $arr = [];
        $trans = [
            
        ];

        foreach ($datas as $data) {
            $item = trim($data->position);
            $cnt = $data->position_cnt;
            if ($arr && array_key_exists($trans[$item], $arr) == true) {
                $arr[$trans[$item]] += $cnt;
            } else {
                $arr += array($trans[$item]=>$cnt);
                $arr[$trans[$item]] = $cnt;
            }
        }
        return $arr;
    }

    private function get_avg($datas){
        $res_avg = 0;
        foreach ($datas as $data){
            $res_avg += $data->position_cnt;
        }
        $res_avg /= count($datas);
        return $res_avg;
    }
}
