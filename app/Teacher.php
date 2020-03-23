<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    public function module()
    {
        return $this->belongsToMany('App\Module', 'teacher_has_module', 'teacher_id','module_id');
    }
}
