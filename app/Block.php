<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $primaryKey = 'name';

    public function module()
    {
        return $this->belongsTo('App\modules', 'block', 'name');
    }
}
