<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{

    protected $fillable = ['name', 'level_id', 'note'];
    protected $table = 'classes';
    public $timestamps = true;


    public function Levels()
    {
        return $this->belongsTo('App\Models\level', 'level_id');
    }


    public function subjects()
    {

        return $this->belongsToMany('App\Models\subject', 'class_subjects');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\teacher', 'teacher_sections');
    }
}
