<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'id'
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
