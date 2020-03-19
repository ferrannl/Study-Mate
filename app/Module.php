<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function teacher()
    {
        return $this->hasMany('App\teacher', 'id', 'docent');
    }

    public function coordinator()
    {
        return $this->hasOne('App\teacher', 'id', 'coördinator');
    }

    public function block(){
        return $this->hasOne('App\block', 'id', 'blok');
    }
}
