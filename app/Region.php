<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function users() {
        return $this->hasMany(Users::class);
    }


    public function getNameAtrribute() {
        return ucwords(strtolower($this->name));
    }
}
