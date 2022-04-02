<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class CreateRoutineController extends Controller
{
    public function generatePdf()
    {
        // return view('routine.pdf');
        $pdf = PDF::loadView('routine.pdf');
        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }

    public function createRoutine (Request $request){
        $priods = array(
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

        $this->data['batchs'] = $batchs;
        $html = '';
        //Loop all Batchs
        foreach($batchs as $batch){
            //what is the running semister of the batch
            $dbBatch = Batch::where('name', $batch)->first();
            $run_semister = $dbBatch->running_semister;
            $this->data['semister'] = $run_semister;
            //how many subject of this semister
            $subjects = Subject::where('department_id', $dept)
                        ->where('semister', $run_semister)
                        ->where('active_status', 1)
                        ->get();

            //Create Unique Random Week and random Classroom
                //filter Lab class
                $week = [];
                $total_day = count($week);
                $total_lab_sub_count = $subjects->where('theory_or_lab', 'lab')->count();
                
                // echo $new1 = $total_day + ($total_lab_sub/2);
                
                    for ($i=0; $total_day <= $total_lab_sub_count; $i++ ) { 
                        if($total_day<=4){
                            array_push($week, $this->generateRandomDay());
                            $week = array_unique($week);
                            $total_day  = count($week);
                        }
                    }
                //filter theory Class
                
                $total_sub = $subjects->where('theory_or_lab', 'theory')->count();
                for ($i=1; $total_sub >= $total_day; $i++) { 
                    if ($total_day >= 4) {
                        break;
                    }
                    $days[]             = $this->generateRandomDay();
                    $week               = array_unique($days);
                    $total_day     = count($week);
                }

                if($total_day > 4){
                    array_pop($week);
                }

                // fixed a class room for this batch 

                $key = array_rand($classRooms);
                $this_batch_classRoom = $classRooms[$key];
                unset($classRooms[$key]);
                $classRooms = array_values($classRooms);
                
            
            
            //Who are the teacher of these subject
            foreach ($subjects as $subject) {

                foreach($subject->teacher as $teacher){
                    $subject->course_name . $teacher->name;
                }

            }

            $htmlTableHead= '
            <!DOCTYPE html>
            <html lang="en">
              <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <title>Routine</title>
              <style>
                header{
                  text-align: center;
                }
                h2{
                  margin: 0px;
                  margin-top:-40px;
                  padding: 0px;
                }
                p{
                  margin: 3px;
                  padding: 0px;
                  font-size: 18px;
                }
                .room_no{
                  float: right;
                  border: 1px solid #000;
                  margin-top: -30px;
                }
                .room_no p{
                  padding: 0px 5px ;
                }
                .bold{
                  font-weight: bold;
                }
                section{
                  margin: 0px;
                  margin-left: -10px;
                  padding: 0px;
                }
                    
                table, tr, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;
                  text-align: center;
                }
                
                table{
                  width: 100%;
                }
                .page-break {
                    page-break-after: always;
                }
                
              </style>
              </head>
              <body>
                <header>
                  <h2>Dhaka International University</h2>
                  <p>Faculty of Sciences & Engineering</p>
                  <p>Department of CSE (1<sup>st</sup> Shift)</p>
                  <p>Batch-'.$batch.'<sup>th</sup></p>
                  <p>Semister-'.$run_semister.'('.  $session .'-2022)</p>
                  <p style="text-decoration: underline; font-weight: bold;">Class Routine</p>
                  <div class="room_no">
                    <p>Room No-'.$this_batch_classRoom.'</p>
                  </div>
                </header>
                <section>
                  <p class="bold">Course Cordinator: Asst. Prof. Md. Habibullah Belali</p>
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
                    </tr>';

                $htmlTableFoot = '</tbody>
            </table>
            </section>
          </body>
        </html>';
            $htmlTableMiddle = "";
                $allTheorySub =  $subjects->where('semister', $run_semister)
                ->where('theory_or_lab', 'theory')
                ->pluck('course_code');
                $allLabSub =  $subjects->where('semister', $run_semister)
                ->where('theory_or_lab', 'theory')
                ->pluck('course_code');
                $allTheorySub   = $allTheorySub->all();
                $allLabSub      = $allLabSub->all();
                // echo "<pre>";
                // print_r($week);
                    $count = 1;
                foreach ($week as $key => $day) {
                    echo $count;
                    if($count == 2 ){
                        $htmlTableMiddle .= '<tr><td  style="line-height: 70px; margin:70px;">'. $day.' </td>';
                    }else{
                        $htmlTableMiddle .= '<tr><td>'. $day.' </td>';
                    }


                    foreach ($priods as $key => $priod) {
                        if ($key == '3rd') {
                            $htmlTableMiddle .='<td>Break</td>';
                            continue;
                        }
                        if(empty($allTheorySub)){
                            $htmlTableMiddle .= '<td></td>';
                            continue;
                        }
                        $key1           = array_rand($allTheorySub);
                        $priod_sub[]    = $allTheorySub[$key1];
                        $new            = array_count_values($priod_sub);
                        
                        if (count($priod_sub) <= 15  ) {
                            $htmlTableMiddle .= '<td>'. $allTheorySub[$key1] .'</td>';
                            
                        }
                        if ($new[$allTheorySub[$key1]] >= 2) {
                            unset($allTheorySub[$key1]);
                        }
                        
                    }
                    if($count == 2 ){
                        $htmlTableMiddle .= '</tr>';
                    }else{
                        
                    $htmlTableMiddle .= '</tr>';
                    }
                    $count+= 1;
                }
                // print_r($priod_sub);
            
            $htmlTable = $htmlTableHead. $htmlTableMiddle. $htmlTableFoot;
            $htmlTable .= '<div class="page-break"></div>';
            $this->data['table'] = $htmlTable;
            // echo '<br>';
            foreach ($allTheorySub as $i => $value) {
                unset($allTheorySub[$i]);
            }
            foreach ($priod_sub as $i => $value) {
                unset($priod_sub[$i]);
            }
            $html .= $htmlTable;
        }
        
        $pdf = PDF::loadHTML($html);
        return $pdf->stream();
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
