<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RoutineFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['manu'] = 'Form';
    }

    public function index (){
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('form', $this->data);
    }

    public function dept(Request $request){
        $shift =  
            [
                0 =>[
                    "id" => 1,
                    "shift" => '1st Shift',
                ],
                1 =>[
                    "id" => 2,
                    "shift" => '2nd Shift',
            ]
        ];
        $html = '<option value ="0"> ---Select '.$request->dependent.' ---</option>';
        if($request->department == 0 ){
            return $html;
        }
        foreach ($shift as $row ) {
            $html .= '<option value="'. $row['id'] .'">'.$row['shift'].'</option>';
            // $html .= '<option value="0">--- Select ---</option><option value="1">'. $row['shift'] .'</option><option value="2">2nd Shift</option>';
        }
        return $html;
    }

    public function shift(Request $request){
        $html = '';
        if($request->shift == 0  ){
            $html = '<option value ="0"> ---Select '.$request->dependent.' ---</option>';
            return $html;
        }
        // $html .= '<option value="'. $row->id .'">'.$row->shift.'</option>';
        $html .= '<option selected value="0">--- Select ---</option><option value="fall">Fall</option><option value="spring">Spring</option><option value="summer">Summer</option>';
        return $html;
    }

    public function session (Request $request){

        $shift      = $request->shift;
        $session    = $request->session;
        $dept       = $request->department;

        $batch = Batch::where('department_id', $dept)
                    ->where('shift_id', $shift)
                    ->where('active_status', 1)
                    ->get();
        $teacher = Teacher::where('department_id', $dept)
                    ->where('active_status', 1)
                    ->get();
        $class =    ClassRoom::where('active_status', 1)
                    ->where('theory_or_lab','theory')
                    ->get();
        $lab =    ClassRoom::where('active_status', 1)
                    ->where('theory_or_lab','lab')
                    ->get();

        return response()->json(['batch' => $batch, 'teacher'=> $teacher, 'class' => $class, 'lab' => $lab]);
    }
}
