<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Department;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['manu'] = 'Batch';
    }

    public function index()
    {
        $this->data['batchs'] = Batch::all();
        return view('batchs.all', $this->data);
    }

    public function create()
    {
        $this->data['departments'] = Department::where('active_status', 1)->get();
        return view('batchs.create', $this->data);
    }

    public function store(Request $request)
    {
        $fromdata = $request->all();
        if ($fromdata['active_status'] == "on") {
            $fromdata['active_status'] = 1;
        } else {
            $fromdata['active_status'] = 0;
        }
        if (Batch::create($fromdata)) {
            $msg = "Subject Insterd Successfully";
        }
        return redirect()->route('batchs.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['departments'] = Department::where('active_status', 1)->get();
        $this->data['batch'] = Batch::find($id);
        return view('batchs.edit', $this->data);
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

        $batch = Batch::find($id);
        $batch->department_id = $request->department_id;
        $batch->name = $request->name;
        $batch->shift_id = $request->shift_id;
        $batch->running_semister = $request->running_semister;
        if ($request->active_status == "on") {
            $batch->active_status = 1;
        } else {
            $batch->active_status = 0;
        }
        if ($batch->save()) {
            $msg = "Batch Updated Successfully";
        }
        return redirect()->route('batchs.index');
    }

    public function destroy($id)
    {
        Batch::destroy($id);
        return redirect()->route('batchs.index');
    }

}
