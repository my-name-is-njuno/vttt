<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
