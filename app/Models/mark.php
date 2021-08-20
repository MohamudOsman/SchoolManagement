<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'classes_id', 'section_id', 'teacher_id', 'exam_id', 'm1'];
    protected $table = 'marks';


    public function student()
    {
        return $this->belongsTo('App\Models\student', 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\classes', 'classes_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\sections', 'section_id');
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
