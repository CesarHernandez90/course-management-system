<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'department_id'
    ];

    protected $guarded = [
        'id'
    ];

    // Establece la relación entre Usuario y Profile
    public function user() 
    {
        return $this->hasOne(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }
}
