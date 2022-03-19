<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreateRoutineController extends Controller
{
    public function createRoutine (Request $request){
        $priod = array(
            "1st" => "09:00-10:20",
            "2nd" => "10:20-11:50",
            "3rd" => "11:50-12:50",
            "4th" => "12:50-01:20",
        );
        // dd($request);
        $dept       = $request->depatment;
        $shift      = $request->shift;
        $session    = $request->session;
        $batchs     = $request->batch;
        $teacher    = $request->teacher;
        $classRooms = $request->classRoom;
        $lab        = $request->lab;


        foreach($batchs as $batch){
            echo $batch;
            $days[] = $this->weekDay();
            $days   = array_unique($days);
        }
        
        print_r($days);
    }

    public function weekDay () {
        $week = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday" ];
        $rand = rand(0, 6);
        return $week[$rand];
    }
}
