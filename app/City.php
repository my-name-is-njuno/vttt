<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name', 'country_id', 'region_id', 'voters'
    ];


    public function users() {
        return $this->hasMany(Users::class);
    }

    public function getNameAtrribute() {
        return ucwords(strtolower($this->name));
    }

    public function getUrlAttribute() {
        return route("cities.show", $this->id);
    }

}
