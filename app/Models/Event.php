<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'date', 'location'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attendees()
    {
        return $this->hasMany('App\UserEventsAttendee');
    }
}
