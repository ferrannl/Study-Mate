<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
//    protected $table = 'categorie';
//    protected $primaryKey = 'naam';
//    public $incrementing = false;
//    protected $keyType = 'string';
//
//    public $timestamps = false;
//    const CREATED_AT = 'creation_date';
//    const UPDATED_AT = 'last_update';
    public function module()
    {
        return $this->belongsToMany('App\Module', 'teacher_has_module', 'teacher_id','module_id');
    }
}
