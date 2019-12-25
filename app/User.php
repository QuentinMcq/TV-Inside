<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable {
    use Notifiable;

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

    function seen() {
        return $this->belongsToMany("App\Episode", 'seen');
    }


    public function commente(){
        return $this->hasMany("App\Comment",'user_id');
    }

    /*public function VuEpisode($idEpisode) {
        $episode=DB::table('seen')->where('episode_id', '=', $idEpisode)->where('user_id', Auth::id())->first();

        if (isset($episode)) {
            return true;
        }

        return false;
    }*/

}
