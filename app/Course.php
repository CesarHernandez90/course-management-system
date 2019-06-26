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

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Profile::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
