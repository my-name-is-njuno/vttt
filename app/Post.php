<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Post extends Model
{
    protected $fillable = [
        'country_id', 'name', 'description'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords(strtolower($value));
        $this->attributes['slug'] = str_slug($value . "-for-".Auth::user()->country->name);
    }


    public function getDescriptionHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }

    public function getUrlAttribute() {
        return route("posts.show", $this->slug);
    }


}
