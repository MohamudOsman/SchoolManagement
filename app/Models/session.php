<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{



    protected $fillable = ['subject_id', 'teacher_id', 'number', 'day'];
    protected $table = 'sessions';


    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\teacher', 'teacher_id');
    }
}
