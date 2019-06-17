<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 
        'schedule', 
        'description',
        'img',
        'id_course_type',
        'id_period',
        'id_department',
        'id_teacher'
    ];

    protected $guarded = [
        'id'
    ];
}
