<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attending extends Model
{
    protected $fillable = [
        'student_id',
        'session_id',
        'teacher_id',
        'date',
        'status',
        'not',
    ];

    protected $table = 'attendings';
}
