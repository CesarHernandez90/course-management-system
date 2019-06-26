<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'id_user', 'id_department'
    ];

    protected $guarded = [
        'id'
    ];

    // Establece la relación entre Usuario y Profile
    public function user() 
    {
        return $this->hasOne(User::class);
        //return $this->belongsTo(User::class, 'id_user');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
