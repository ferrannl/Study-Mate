<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function teacher()
    {
        return $this->belongsToMany('App\Teacher', 'teacher_has_module', 'module_id','teacher_id');
    }

    public function coordinator()
    {
        return $this->hasMany('App\Teacher', 'id', 'coordinator');
    }

    public function block(){
        return $this->belongsTo('App\Block', 'name', 'block');
    }

    public function assignment(){
        return $this->hasMany('App\Assignment', 'module_id', 'id');
    }

}
