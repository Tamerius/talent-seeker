<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'position',
        'notes',
        'daysAvailable',
        'hired',
        'views',
        'yearsExperience'
    ];
}
