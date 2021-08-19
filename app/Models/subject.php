<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{

    protected $fillable = ['name', 'max_mark', 'min_mark', 'note'];
    protected $table = 'subjects';
    public $timestamps = true;


    public function class()
    {

        return $this->belongsToMany('App\Models\classes', 'class_subjects');
    }

    public function Teacher()
    {
        return $this->belongsToMany('App\Models\teacher', 'teacher_sections');
    }

    public function section()
    {
        return $this->belongsToMany('App\Models\sections', 'teacher_sections');
    }
}
