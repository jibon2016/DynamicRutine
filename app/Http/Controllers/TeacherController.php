<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Routine;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('teachers.all', $this->data);
    }

    public function create()
    {
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('teachers.create', $this->data);
    }

    public function store(Request $request)
    {
        $fromdata = $request->all();
        if ($fromdata['active_status'] == 1) {
            $fromdata['active_status'] = 1;
        } else {
            $fromdata['active_status'] = 0;
        }
        if (Teacher::create($fromdata)) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'teacher',
                'created_at' => Carbon::now()
            ]);
            $msg = "Subject Insterd Successfully";
        }
        return redirect()->route('teachers.index');
    }

    public function edit($id)
    {
        $this->data['teacher'] = Teacher::find($id);
        $this->data['user_data'] = User::where('name', $this->data['teacher']->name )->first();
        // dd($this->data['user_data']);
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('teachers.edit', $this->data);
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

        $teacher = Teacher::find($id);
        $teacher->department_id = $request->department_id;
        $teacher->name = $request->name;

        if ($request->active_status == "on") {
            $teacher->active_status = 1;
        } else {
            $teacher->active_status = 0;
        }
        if ($request->login_details == "on") {
            // $user = User::where('name', $request->old_name)->first();
            $email = $request->input('email');
            User::updateOrCreate([
                'email' => $email,
            ],[
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'role' => 'teacher',
                'updated_at' => Carbon::now()
            ]);
        }
        if ($teacher->save()) {
            $msg = "teacher Updated Successfully";
        }
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }

    public function addTeacherSub($id, $dept)
    {

        $this->data['teacher'] = Teacher::find($id);
        $this->data['subjects'] = Subject::where('department_id', $dept)
            ->get();
        return view('teachers.subtech', $this->data);
    }

    // public function sub_add_tea (Request $request){
    //     $subject = Subject::where('semister', $request->semister)
    //     ->where('department_id', $request->dept)
    //     ->get();
    //     return response()->json(['subject'=> $subject]);
// }

    public function add_teacher_sub(Request $request)
    {
        $teacher = Teacher::find($request->teacher);
        $teacher->subject()->sync($request->subject);
        return redirect()->route('teachers.index');
    }

    public function routineTeacher()
    {
        if (Auth::user()->role == 'teacher') {
            $this->data['manu'] = 'Home';
            $teacher = Teacher::where('name', Auth::user()->name)->first();
            $this->data['routines'] = Routine::where('year', 2022)
                ->where('teacher_id', $teacher->id)
                ->where('admin_aprove', 1)
                ->get();

            return view('teachers.showRoutine', $this->data);
        }
    }
}
