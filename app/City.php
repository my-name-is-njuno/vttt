<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function users() {
        return $this->hasMany(Users::class);
    }

    public function getNameAtrribute() {
        return ucwords(strtolower($this->name));
    }


    
}
