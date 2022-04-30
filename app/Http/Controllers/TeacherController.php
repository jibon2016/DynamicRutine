<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['manu'] = 'Teacher';
    }


    public function index()
    {
        $this->data['teachers'] = Teacher::all();
        return view('teachers.all', $this->data );
    }



    public function create()
    {
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('teachers.create', $this->data );
    }



    public function store(Request $request)
    {
        $fromdata = $request->all();
        if($fromdata['active_status'] == 1 ){
            $fromdata['active_status'] = 1;
        }else{
            $fromdata['active_status'] = 0;
        }
        if (Teacher::create($fromdata)) {
            $msg = "Subject Insterd Successfully";;
        } 
        return redirect()->route('teachers.index');
    }


    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addTeacherSub($id, $dept){
        
        $this->data['teacher'] = Teacher::find($id);
        $this->data['subjects'] = Subject::where('department_id',$dept)
        ->get();
        return view('teachers.subtech', $this->data);
    }

    // public function sub_add_tea (Request $request){
    //     $subject = Subject::where('semister', $request->semister)
    //     ->where('department_id', $request->dept)
    //     ->get();
    //     return response()->json(['subject'=> $subject]);
// }

    public function add_teacher_sub(Request $request){
        $teacher = Teacher::find($request->teacher);
        $teacher->subject()->sync($request->subject);
        return redirect()->route('teachers.index');
    }
}
