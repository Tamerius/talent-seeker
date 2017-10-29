<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

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

    protected $dates = [
        'deleted_at'
    ];

    public function getNotesShortAttribute($value)
    {
        if (strlen($this->notes) > 100)
        {
            return substr($this->notes, 0, 100) . '...';
        }
        return substr($this->notes, 0, 100);
    }

    public function getExperienceDescriptionAttribute($value)
    {
        if ($this->yearsExperience == 0)
        {
            return "No experience yet.";
        }
        elseif ($this->yearsExperience == 1)
        {
            return $this->yearsExperience . " year of experience as " . $this->position . ".";
        }
        return $this->yearsExperience . " years of experience as " . $this->position . ".";
    }
}
