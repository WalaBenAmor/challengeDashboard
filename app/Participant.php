<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Participant extends User
{
    public function codes(){
        return $this->hasMany("App\Code");
    }
    public function comments(){
        return $this->hasMany("App\Comment");
    }
}
