<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    //

    public function comments(){
        return $this->hasMany("App\Comment");
    }

    public function codes(){
        return $this->hasMany("App\Code");
    }

    public function Organizer()
    {
        return $this->belongsTo('App\Organizer');
    }
}
