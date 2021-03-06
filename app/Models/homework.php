<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class homework extends Model
{
    protected $fillable = ['subject_id', 'classes_id', 'section_id', 'teacher_id', 'date', 'information'];
    protected $table = 'homework';



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
}
