<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function candidates()
    {
        return $this->hasManay(Candidate::class);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords(strtolower($value));
        $this->attributes['slug'] = str_slug($value + "-for-" +$this->user->country->name);
    }


    public function getDescriptionHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }


}
