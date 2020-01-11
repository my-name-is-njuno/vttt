<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    } 

    public function agenda()
    {
        return $this->hasOne(Agenda::class);
    } 

    public function promise()
    {
        return $this->hasOne(Promise::class);
    } 
}
