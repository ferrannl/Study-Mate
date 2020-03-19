<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function module()
    {
        return $this->belongsTo('App\modules', 'block_id', 'id');
    }
}
