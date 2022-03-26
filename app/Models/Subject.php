<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // protected $guarded = ['theory_or_lab'];
    protected $fillable = ['department_id','theory_or_lab', 'course_name', 'course_code', 'course_cradit', 'semister', 'active_status'];


    public function teacher(){
        return $this->belongsToMany(Teacher::class, 'subject_teacher', 'subject_id', 'teacher_id');
    }
}
