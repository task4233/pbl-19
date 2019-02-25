<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\Position;

class PositionController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        // normal graph
        $resigned_positions = Position::getResignedPositions();
        self::fill_resigned_data($resigned_positions);
        $avg_resigned_positions = $resigned_positions->avg();
        // $summarized_resigned_positions = self::summarize_positions_graph($resigned_positions);

        $emp_positions      = Position::getEmpPositions();
        self::fill_emp_data($emp_positions);
        $avg_resigned_positions = $emp_positions->avg();
        // $summarized_emp_positions = self::summarize_positions_graph($emp_positions);

        // summarized graph

        

        return view('position', compact('resigned_positions', 'emp_positions'));
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

}
