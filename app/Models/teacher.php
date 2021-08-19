<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{

    protected $fillable = ['name', 'user_id', 'phone', 'email', 'gender', 'date_of_birth', 'Address'];
    protected $table = 'teachers';



    public function certificate()
    {
        return $this->belongsToMany('App\Models\certificate', 'teacher_certificates');
    }



    public function section()
    {
        return $this->belongsToMany('App\Models\sections', 'teacher_sections');
    }
    public function classes()
    {
        return $this->belongsToMany('App\Models\classes', 'teacher_sections');
    }
    public function subject()
    {
        return $this->belongsToMany('App\Models\subjects', 'teacher_subject');
    }
}
