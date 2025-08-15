<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'venue',
        'date',
        'time',
        'image'
    ];

    // Replace $dates with $casts
    protected $casts = [
        'date' => 'date', // or 'datetime' if you need time component
    ];

    public function getEventDateTimeAttribute()
    {
        // Make sure to parse the time as well if needed
        return $this->date->format('Y-m-d') . ' ' . $this->time;
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
