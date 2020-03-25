<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function module()
    {
        return $this->belongsTo('App\Module', 'block', 'name');
    }
}
