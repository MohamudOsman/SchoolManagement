<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['name', 'user_id', 'my_parent_id', 'class_id', 'section_id', 'gender', 'date_of_birth', 'phone', 'email'];
    protected $table = 'students';
    public $timestamps = true;




    public function parent()
    {
        return $this->belongsTo('App\Models\my_parent', 'my_parent_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\classes', 'class_id');
    }

    public function sections()
    {
        return $this->belongsTo('App\Models\sections', 'section_id');
    }
}
