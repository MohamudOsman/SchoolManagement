<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{



    protected $fillable = ['number', 'day', 'section_id', 'teacher_id', 'subject_id'];
    protected $table = 'sessions';


    public function section()
    {
        return $this->belongsTo('App\Models\sections', 'section_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\teacher', 'teacher_id');
    }
}
