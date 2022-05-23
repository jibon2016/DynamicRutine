<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'department_id', 'shift_id', 'running_semister', 'active_status');

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
