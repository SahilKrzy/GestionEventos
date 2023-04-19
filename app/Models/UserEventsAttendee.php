<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEventsAttendee extends Model
{
    protected $fillable = ['user_id', 'event_id', 'name', 'email'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
