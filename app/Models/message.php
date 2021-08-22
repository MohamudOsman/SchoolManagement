<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{



    protected $fillable = ['from', 'to', 'message'];
    protected $table = 'messages';


    public function from()
    {
        return $this->belongsTo('App\Models\User', 'from');
    }

    public function to()
    {
        return $this->belongsTo('App\Models\User', 'to');
    }
}
