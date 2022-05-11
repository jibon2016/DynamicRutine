<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['manu'] = 'Home';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'teacher') {
            $teacher = Teacher::where('name', Auth::user()->name)->first();
            $this->data['routine'] = Routine::where('teacher_id',$teacher->id)
                                ->where('year', date('Y'))
                                ->where('admin_aprove', 1)
                                ->get();
                
            return view('teachers.teacherHome', $this->data);
        }else{
            return view('home', $this->data);
        }
    }
}
