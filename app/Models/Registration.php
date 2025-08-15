<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['event_id', 'name', 'email', 'phone'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
