<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function teacher()
    {
        return $this->belongsToMany('App\Teacher', 'teacher_has_module', 'teacher_id','module_id');
    }

    public function coordinator()
    {
        return $this->hasOne('App\teacher', 'id', 'coördinator');
    }

    public function block(){
        return $this->hasOne('App\block', 'id', 'blok');
    }
}
