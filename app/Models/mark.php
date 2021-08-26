<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    protected $fillable = ['student_id',  'teacher_id', 'exam_id', 'm1'];
    protected $table = 'marks';


    public function student()
    {
        return $this->belongsTo('App\Models\student', 'student_id');
    }


    public function teacher()
    {
        return $this->belongsTo('App\Models\teacher', 'teacher_id');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\exam', 'exam_id');
    }
}
