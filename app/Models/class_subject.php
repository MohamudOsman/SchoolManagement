<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class class_subject extends Model
{
    protected $fillable = ['subject_id', 'classes_id'];
    protected $table = 'class_subjects';



    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\classes', 'classes_id');
    }
}
