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
        'course_type_id',
        'period_id',
        'department_id',
        'teacher_id'
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

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
