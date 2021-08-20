<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $fillable = ['subject_id', 'name', 'term', 'date'];
    protected $table = 'exams';


    public function subject()
    {
        return $this->belongsTo('App\Models\subject', 'subject_id');
    }
}
