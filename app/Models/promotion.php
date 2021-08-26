<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    public function from_class()
    {
        return $this->belongsTo('App\Models\classes', 'from_class');
    }
    public function from_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }
    public function to_class()
    {
        return $this->belongsTo('App\Models\classes', 'to_class');
    }
    public function to_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}
