<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function module()
    {
        return $this->belongsToMany('App\Module', 'teacher_has_module', 'teacher_id','module_id');
    }

    public function myModule(){
        return $this->belongsTo('App\Module', 'teacher', 'id');
    }

    public function moduleCoordinator(){
        return $this->belongsTo('App\Module', 'coordinator', 'id');
    }

    public function assignment(){
        return $this->belongsTo('App\Assignment', 'teacher_id', 'id');
    }
}
