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
        return $this->hasOne('App\Teacher', 'id', 'coördinator');
    }

    public function block(){
        return $this->hasOne('App\Block', 'name', 'block');
    }

    public function assignment(){
        return $this->belongsTo('App\Assignment', 'module_id', 'id');
    }

}
