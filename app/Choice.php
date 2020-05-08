<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $guarded = ['id'];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}
