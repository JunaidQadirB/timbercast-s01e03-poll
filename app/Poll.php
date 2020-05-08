<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['ended_at' => 'datetime: Y-m-d h:i A'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
