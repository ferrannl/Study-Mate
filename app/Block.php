<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function module()
    {
        return $this->belongsToMany('App\modules', 'id', 'blok');
    }
}
