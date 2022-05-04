<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['manu'] = 'Subject';
    }

    public function index()
    {
        $this->data['subjects'] = Subject::all();
        return view('subjects.all', $this->data );
    }


    public function create()
    {        
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('subjects.create', $this->data );
    }


    public function store(Request $request)
    {
        $fromdata = $request->all();
        $fromdata['theory_or_lab'] = "lab";
        if($fromdata['active_status'] == "on"){
            $fromdata['active_status'] = 1;
        }else{
            $fromdata['active_status'] = 0;
        }
        if (Subject::create($fromdata)) {
            $msg = "Subject Insterd Successfully";;
        } 
        return redirect()->route('subjects.index');
    }


    
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['departments']  = Department::where('active_status', 1)->get();
        $this->data['subject']     = Subject::find($id);
        return view('subjects.edit', $this->data );
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
        $subject =  Subject::find($id);
        $subject->department_id = $request->department_id;
        $subject->course_name = $request->course_name;
        $subject->course_code = $request->course_code;
        $subject->course_cradit = $request->course_cradit;
        $subject->semister = $request->semister;
        $subject->active_status = $request->active_status;

        $subject->theory_or_lab = "theory";
        if($request->active_status == "on"){
            $subject->active_status = 1;
        }else{
            $subject->active_status = 0;
        }
        if ($subject->save()) {
            $msg = "Subject Updated Successfully";;
        } 
        return redirect()->route('subjects.index');
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
}
