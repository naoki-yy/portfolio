<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use SoftDeletes;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
