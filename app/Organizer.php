<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Organizer extends User
{
    public function challenges(){
        return $this->hasMany("App\Challenge");
    }
}
