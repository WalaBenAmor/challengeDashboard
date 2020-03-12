<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function Challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

    public function Participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
