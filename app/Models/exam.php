<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $fillable = ['subject_id', 'classes_id', 'term', 'date'];
    protected $table = 'exams';


    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\classes', 'classes_id');
    }
}
