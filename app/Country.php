<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'code'
    ];
    public function users() {
        return $this->hasMany(Users::class);
    }

    public function candidates() {
        return $this->hasMany(Candidate::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function discussions() {
        return $this->hasMany(Discussion::class);
    }

    public function promises() {
        return $this->hasMany(Promise::class);
    }

    public function agendas() {
        return $this->hasMany(Agenda::class);
    }

    public function getNameAtrribute() {
        return ucwords(strtolower($this->name));
    }


    public function getUrlAttribute() {
        return route("countries.show", $this->id);
    }
}
