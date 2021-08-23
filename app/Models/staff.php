<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{

    protected $fillable = ['name', 'user_id', 'phone', 'email', 'gender',  'date_of_birth', 'Address'];
    protected $table = 'staff';


    public function certificate()
    {
        return $this->belongsToMany('App\Models\certificate', 'staff_certificates');
    }
}
