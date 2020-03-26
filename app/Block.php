<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function module()
    {
        return $this->hasMany('App\Module', 'block', 'name');
    }
    public function semester(){
        return $this->hasMany('App\Semester', 'name', 'semester_name');
    }
}
