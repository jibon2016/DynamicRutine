<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Routine;
use App\Models\Subject;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CreateRoutineController extends Controller
{

    public function generatePdf()
    {
        // return view('routine.pdf');
        $pdf = PDF::loadView('routine.pdf');
        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }

    public function createRoutine(Request $request)
    {
        if ($this->checkAdminApprove($request)) {
            return redirect()->back()->withErrors(array('errors' => 'These Batchs are Panding to Admin approval.'));
        }$priods = array(
            "1st" => "09:00-10:20",
            "2nd" => "10:20-11:50",
            "3rd" => "11:50-12:50",
            "4th" => "12:50-01:20",
        );

        $dept = $request->department;
        $shift = $request->shift;
        $session = $request->session;
        $batchs = $request->batch;
        $teacher = $request->teacher;
        $classRooms = $request->classRoom;
        $lab = $request->lab;

        $this->data['batchs'] = $batchs;
        $html = '';
        //Create Batch No
        $lastBatchNo = Routine::orderByDesc('id')->first()->batch_no;
        // Get last 3 digits of last order id
        $lastIncreament = substr($lastBatchNo, -3);
        // Make a new order id with appending last increment + 1
        $newBatchNo = date('Ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);
        $formData = array();
        $data = array();
        $formData['batch_no'] = $newBatchNo;
        $formData['department_id'] = $dept;
        $formData['shift'] = $shift;
        $formData['session'] = $session;
        $formData['year'] = (int) date('Y');
        //Loop all Batchs
        foreach ($batchs as $batch) {
            //what is the running semister of the batch
            $dbBatch = Batch::where('name', $batch)->first();
            $run_semister = $dbBatch->running_semister;
            $this->data['semister'] = $run_semister;

            //how many subject of this semister
            $subjects = Subject::where('department_id', $dept)
                ->where('semister', $run_semister)
                ->where('active_status', 1)
                ->get();
            $formData['semister'] = $run_semister;
            //Create Unique Random Week and random Classroom
            //filter Lab class
            $week = array();
            $total_day = count($week);
            $total_lab_sub_count = $subjects->where('theory_or_lab', 'lab')->count();

            for ($i = 0; $total_day <= $total_lab_sub_count; $i++) {
                if ($total_day <= 4) {
                    array_push($week, $this->generateRandomDay());
                    $week = array_unique($week);
                    $total_day = count($week);
                }
            }
            //filter theory Class
            $total_sub = $subjects->where('theory_or_lab', 'theory')->count();
            for ($i = 1; $total_sub >= $total_day; $i++) {
                if ($total_day >= 4) {
                    break;
                }
                $days[] = $this->generateRandomDay();
                $week = array_unique($days);
                $total_day = count($week);
            }

            if ($total_day > 4) {
                array_pop($week);
            }

            // fixed a class room for this batch
            $key = array_rand($classRooms);
            $this_batch_classRoom = $classRooms[$key];
            unset($classRooms[$key]);
            $classRooms = array_values($classRooms);
            $formData['room_no'] = $this_batch_classRoom;
            $formData['batch'] = $batch;

            //fixed a coordinator
            $coTeacher = Teacher::where('department_id', $dept)
                ->where('active_status', 1)
                ->get();
            $coTeacher_arr = array();
            $coTeacher_arr = $coTeacher->pluck('id')->all();
            $co_key = array_rand($coTeacher_arr);
            $coordinator = $coTeacher_arr[$co_key];
            $formData['coordinator'] = $coordinator;
            //Table Structure
            $htmlTableHead = '
            <!DOCTYPE html>
            <html lang="en">
              <head>
              <meta  http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                width: 100%;
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
              .height-3{
                line-height: 4;
                text-align: left;
              }
              td{
              }
              .text-left{
                width: 60%;
                float: left;
              }
              .text-right{
                width: 40%;
                float: right;
                height: 400px;
              }
              .font-15{
                font-size: 16px;
              }
              .mark{
                height: 150px;
                width: 290px;
                border: 1px solid #000;
                padding: 20px;
              }
              .center{
                text-align: center;
                font-weight: bold;
                text-decoration: underline;
              }
              .sub{
                float: right;
                width: 10%;
              }
              .per{
                float: left;
                width: 90%;
              }
              </style>
              </head>
              <body>
                <header>
                  <h2>Dhaka International University</h2>
                  <p>Faculty of Sciences & Engineering</p>
                  <p>Department of CSE (1<sup>st</sup> Shift)</p>
                  <p>Batch-' . $batch . '<sup>th</sup></p>
                  <p>Semister-' . $run_semister . '(' . $session . '-2022)</p>
                  <p style="text-decoration: underline; font-weight: bold;">Class Routine</p>
                  <div class="room_no">
                    <p>Room No-' . $this_batch_classRoom . '</p>
                  </div>
                </header>
                <section>
                  <p class="bold">Course Cordinator: ' . Teacher::find($coordinator)->name . '</p>
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
                </table>';
            $htmlTableMiddle = "";
            $allTheorySub = $subjects->where('semister', $run_semister)
                ->where('theory_or_lab', 'theory')
                ->pluck('course_code');
            $allLabSub = $subjects->where('semister', $run_semister)
                ->where('theory_or_lab', 'lab')
                ->pluck('course_code');
            $allTheorySub = $allTheorySub->all();
            $allLabSub = $allLabSub->all();

            //Loop week all day
            $count = 1;
            foreach ($week as $key => $day) {
                if ($count == 2) {
                    $htmlTableMiddle .= '<tr><td>' . $day . ' </td>';
                } else {
                    $htmlTableMiddle .= '<tr><td>' . $day . ' </td>';
                }

                //In a day loop all Priod
                foreach ($priods as $key => $priod) {
                    if ($key == '3rd') {
                        $htmlTableMiddle .= '<td>Break</td>';
                        continue;
                    }
                    if (empty($allTheorySub)) {
                        $htmlTableMiddle .= '<td></td>';
                        continue;
                    }

                    //A week Second day is Lab Class
                    if ($count == 2) {
                        if (empty($allLabSub)) {
                            $htmlTableMiddle .= '<td></td>';
                            continue;
                        }
                        $key2 = array_rand($allLabSub);
                        $priod_sub[] = $allLabSub[$key2];
                        $new1 = array_count_values($priod_sub);

                        //For fixed Lab Room
                        $key3 = array_rand($lab);
                        $labRoom = $lab[$key3];

                        if (count($priod_sub) <= 15) {
                            if ($key == '1st') {
                                $htmlTableMiddle .= '<td colspan="2" >Lab Class<br>' . $allLabSub[$key2] . '<br>Lab-' . $labRoom . '</td>';
                                $lab_no[$allLabSub[$key2]] = $labRoom;
                                $data[$day][$key] = $allLabSub[$key2];
                            } elseif ($key == '2nd') {
                                $htmlTableMiddle .= '';
                                continue;
                            } else {
                                $htmlTableMiddle .= '<td>Lab Class<br>' . $allLabSub[$key2] . '<br>Lab-' . $labRoom . '</td>';
                                $data[$day][$key] = $allLabSub[$key2];
                                $lab_no[$allLabSub[$key2]] = $labRoom;
                            }

                        }
                        if ($new1[$allLabSub[$key2]] >= 1) {
                            unset($allLabSub[$key2]);
                        }

                    } else {
                        $key1 = array_rand($allTheorySub);
                        $priod_sub[] = $allTheorySub[$key1];
                        $new = array_count_values($priod_sub);

                        if (count($priod_sub) <= 15) {
                            $htmlTableMiddle .= '<td>' . $allTheorySub[$key1] . '</td>';
                            $data[$day][$key] = $allTheorySub[$key1];

                        }
                        if ($new[$allTheorySub[$key1]] >= 3) {
                            unset($allTheorySub[$key1]);
                        }
                    }

                } //End of a Priod

                if ($count == 2) {
                    $htmlTableMiddle .= '</tr>';
                } else {

                    $htmlTableMiddle .= '</tr>';
                }
                $count += 1;

            } //End of a day

            $htmlTable = $htmlTableHead . $htmlTableMiddle . $htmlTableFoot;

            $htmlTable .= '<table  style="margin-top:40px;">
            <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Name of the teacher</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($subjects as $subject) {
                $subteach[$subject->course_code] = $subject->course_name;
                $subteach = array_unique($subteach);

            }
            foreach ($subteach as $key => $sub) {
                $subject = Subject::where('course_code', $key)->first();
                if ($subject->teacher->count() > 0) {
                    foreach ($subject->teacher as $teacher) {
                        $teacherall[$teacher->id] = $teacher->name;
                    }
                    $teacherkey = array_rand($teacherall);
                    $teacherName = $teacherall[$teacherkey];
                    $data1[$key] = $teacherkey;

                } else {
                    $teacherName = 'No Teacher';
                    $data1[$key] = '';
                }

                $htmlTable .= '
                <tr>
                    <td>' . $key . '</td>
                    <td>' . $sub . '</td>
                    <td>' . $teacherName . '</td>
                </tr>';
            }

            //Data insert into table
            foreach ($data as $dataDay => $dataValue) {

                $formData['day'] = $dataDay;

                foreach ($dataValue as $dataPriod => $dataSub) {
                    $subject = Subject::where('course_code', $dataSub)->first();
                    $formData['priod'] = $dataPriod;
                    $formData['subject'] = $dataSub;
                    $formData['theory_or_lab'] = $subject->theory_or_lab;
                    $formData['cradit'] = $subject->course_cradit;
                    foreach ($priods as $priodKey => $time) {
                        if ($dataPriod == $priodKey) {
                            $formData['priod_time'] = $time;
                        }
                    }

                    $formData['lab_no'] = null;
                    foreach ($lab_no as $key => $value) {
                        if ($key == $dataSub) {
                            if ($subject->theory_or_lab == 'lab') {
                                $formData['lab_no'] = $value;
                            }
                        }
                    }

                    foreach ($data1 as $key => $value) {
                        if ($key == $dataSub) {
                            $formData['teacher_id'] = $value;
                            if ($value == '') {
                                $formData['teacher_id'] = null;
                            }
                        }
                    }

                    if (!Routine::create($formData)) {
                        return "Data Not Stored";
                    }

                }

            }

            $htmlTable .= '</tbody>
                        </table>
                        </section><section style="margin-top: 40px;">
                        <div class="text-left">
                          <p><strong>Academic Calender:</strong></p>
                          <p>Class Commencement Date: 00.00.0000</p>
                          <p>Mid-term Exam Date: 00.00.0000</p>
                          <p>Mid-term Retake Date: 00.00.0000</p>
                          <p>Mid-term Result Publishing Date: 00.00.0000</p>
                          <p>Tuition Fee Payment Last Date: 00.00.0000</p>
                          <p>Course Distribution for Next Semester: 00.00.0000 to 00.00.0000</p>
                          <p>Class Closing Date: 00.00.0000</p>
                          <p>Semester Final Exam Date: 00.00.0000 to 00.00.0000</p>
                          <p class="font-15">Routine Distribution for Next Semister: On the date of 2<sup>nd</sup> Course Exam.</p>
                          <p>Result Publish Date: 00.00.0000</p>
                          <p>Tabulation Submission on the Controller office Date: 00.00.0000</p>
                          <p>Semister Break: ************</p>
                          <p>Next Semister Class Start Date: 00.00.0000</p>
                        </div>
                        <div class="text-right">
                          <div class="mark">
                            <p class="center">Mark Distribution:</p>
                            <div class="sub">
                              <p>20%</p>
                              <p>10%</p>
                              <p>10%</p>
                              <p>10%</p>
                              <p>50%</p>
                            </div>
                            <div class="per">
                              <p>Mid-term Exam:</p>
                              <p>Assignment/Class study:</p>
                              <p>Class participation, Presentation:</p>
                              <p>Attendance & Behavior:</p>
                              <p>Semester Final:</p>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section>
                        <strong>
                          <p>Web Site: <a href="#">www.diu.ac/Cse</a>, E-mail: students@diu-bd.net</p>
                          <p>Departments Facebook Group Link: Department of CSE, Dhaka Internatioal University</p>
                          <p>(Green Road):<a href="#">https://www.facebook.com/groups/13453453453425/learning_content</a></p>
                        </strong>
                      </section>
                        </body>
                    </html>';

            $htmlTable .= '<div class="page-break"></div>';

            //Unset all array
            foreach ($allTheorySub as $i => $value) {
                unset($allTheorySub[$i]);
            }
            foreach ($priod_sub as $i => $value) {
                unset($priod_sub[$i]);
            }
            foreach ($subteach as $i => $value) {
                unset($subteach[$i]);
            }
            foreach ($data as $i => $value) {
                unset($data[$i]);
            }
            foreach ($data1 as $i => $value) {
                unset($data1[$i]);
            }
            foreach ($lab_no as $i => $value) {
                unset($lab_no[$i]);
            }

            $html .= $htmlTable;
        } //End of Batchs
        $pdf = PDF::loadHTML($html);
        return $pdf->stream();
    }

    public function showRoutine()
    {

        $this->data['manu'] = 'Routine';
        $this->data['routines'] = Routine::where('year', 2022)
            ->get();
        return view('routine.show', $this->data);
    }

    public function routineApprove($batch_no)
    {
        $routine = Routine::where('batch_no', $batch_no)->update(array('admin_aprove' => 1));
        if ($routine) {
            return Redirect::back()->with('message', 'Routine Approved');
        }
    }

    public function addTeacher()
    {
        $teacher = new Teacher();
        $teacher->department_id = 1;
        $teacher->name = "Mahabub Cse";
        $teacher->active_status = 1;
        $teacher->save();
        $subjectId = array(13, 14, 15, 16);
        $teacher->subject()->attach($subjectId);
        return "Teacher Created successfully";
    }

    public function generateRandomDay()
    {
        $week = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
        $rand = rand(0, 6);
        return $week[$rand];
    }

    public function checkAdminApprove($request)
    {
        $session = $request->session;
        $batchs = $request->batch;
        foreach ($batchs as $batch) {
            if (Routine::where('batch', $batch)
                ->where('session', $session)
                ->where('admin_aprove', 0)
                ->first()) {
                return true;
            }
        }
        return false;
    }

}
