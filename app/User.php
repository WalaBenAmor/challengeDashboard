<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function isAdmin()
    {
        if ($this->type === 'Admin') {
            return true;
        }

        return false;
    }
    public function isGuest()
    {
        if ($this->type === 'Guest') {
            return true;
        }

        return false;
    }
    public function isParticipant()
    {
        if ($this->type === 'Participant') {
            return true;
        }

        return false;
    }
    public function isOrganizer()
    {
        if ($this->type === 'Organizer') {
            return true;
        }

        return false;
    }
}
