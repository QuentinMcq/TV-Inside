<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //Un genre peut correspondre à plusieurs séries

    public function serie()
    {
        return $this->belongsToMany("App\Serie");
    }

}
