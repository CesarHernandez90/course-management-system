<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $fillable = [
        'name', 'start', 'end', 'active'
    ];

    public $guarded = [
        'id'
    ];
}
