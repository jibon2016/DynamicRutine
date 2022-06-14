<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id', 'active_status'];

    public function subject(){
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'teacher_id', 'subject_id');
    }
    // public function routine(){
    //     return $this->belongsToMany(Routine::class);
    // }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
