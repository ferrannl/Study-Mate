<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function module()
    {
        return $this->hasOne('App\Module', 'id','module_id');
    }
    public function teacher()
    {
        return $this->hasOne('App\Teacher', 'id','teacher_id');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'id','category_id');
    }
}
