<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = [
        'country_id', 'vote', 'reason'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
