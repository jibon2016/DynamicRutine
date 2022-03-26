<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Subject;
use App\Models\Teacher;
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
        $dept       = $request->department;
        $shift      = $request->shift;
        $session    = $request->session;
        $batchs     = $request->batch;
        $teacher    = $request->teacher;
        $classRooms = $request->classRoom;
        $lab        = $request->lab;

        //Loop all Batchs
        foreach($batchs as $batch){

            //what is the running semister of the batch
            $dbBatch = Batch::where('name', $batch)->first();
            $run_semister = $dbBatch->running_semister;

            //how many subject of this semister
            $subjects = Subject::where('department_id', $dept)
                        ->where('semister', $run_semister)
                        ->where('active_status', 1)
                        ->get();

            //Create Unique Random Week and random Classroom
                static $week = [];
                $total_day = count($week);
                $total_sub = $subjects->where('theory_or_lab', 'theory')->count();
                for ($i=1; $total_sub > $total_day; $i++) { 
                    $days[]     = $this->generateRandomDay();
                    $week       = array_unique($days);
                    $total_day  = count($week);
                }

                $key = array_rand($classRooms);
                echo $this_batch_classRoom = $classRooms[$key];
                unset($classRooms[$key]);
                $classRooms = array_values($classRooms);
                
            
            
            //Who are the teacher of these subject
            foreach ($subjects as $subject) {

                foreach($subject->teacher as $teacher){
                    $subject->course_name . $teacher->name;
                }

            }


            $allTheorySub =  $subjects->where('theory_or_lab', 'theory')->pluck('course_code');
            $allTheorySub = $allTheorySub->all();
            $key1 = array_rand($allTheorySub);
            echo $allTheorySub[$key1];
            echo $run_semister;

            $htmlTable= '
            <table border="1">
                <thead>
                    <tr>
                        <td>Time & Day</td>
                        <td>09:00-10:20</td>
                        <td>10:30-11:50</td>
                        <td>11:50-12:00</td>
                        <td>12:00-01:20</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>1<sup>st</sup></td>
                        <td>2<sup>nd</sup></td>
                        <td>3<sup>rd</sup></td>
                        <td>4<sup>th</sup></td>
                    </tr>
                    <tr>
                    
                        <td>'. $week[0] .' </td>
                        <td>'. $priod['1st'] = $allTheorySub[$key1] .'</td>
                        <td>'. $priod['2nd'] = $allTheorySub[$key1] .'</td>
                        <td>'. $priod['3rd'] = "Break" .'</td>
                        <td>'. $priod['4th'] = $allTheorySub[$key1] .'</td>
                    </tr>
                </tbody>
            </table>';
            break;
        }
        
        echo $htmlTable;
        print_r($week);
    }


    public function addTeacher(){
        $teacher = new Teacher();

        $teacher->department_id = 1;
        $teacher->name = "Mahabub Cse";
        $teacher->active_status = 1;
        $teacher->save();

        $subjectId  =  [13,14,15,16];

        $teacher->subject()->attach($subjectId);
        return "Teacher Created successfully";
    }






    public function generateRandomDay () {
        $week = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday" ];
        $rand = rand(0, 6);
        return $week[$rand];
    }
}
