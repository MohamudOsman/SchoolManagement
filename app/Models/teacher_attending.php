<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher_attending extends Model
{
    protected $fillable = [
        'teacher_id',
        'date',
        'status',
        'not',
    ];
    protected $table = 'teacher_attendings';
}
