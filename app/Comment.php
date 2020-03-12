<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * Get the post that owns the comment.
     */
    public function Challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

    public function Participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
