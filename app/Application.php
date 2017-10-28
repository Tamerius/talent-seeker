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

    public function setHiredAttribute($value)
    {
        $this->attributes['hired'] = ucfirst($value);
    }

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
