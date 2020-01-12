<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'country_id', 'name'
    ];

    public function users() {
        return $this->hasMany(Users::class);
    }


    public function getNameAtrribute() {
        return ucwords(strtolower($this->name));
    }

    public function getUrlAttribute() {
        return route("regions.show", $this->id);
    }
}
