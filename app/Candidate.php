<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Candidate extends Model
{
    protected $fillable = [
        'full_name', 'place_name', 'dob', 'country_id', 'political_party', 'running_as', 'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function agenda()
    {
        return $this->hasOne(Agenda::class);
    }

    public function promise()
    {
        return $this->hasOne(Promise::class);
    }

    public function about()
    {
        return $this->hasOne(About::class);
    }

    public function candidatecomments()
    {
        return $this->hasMany(Candidatecomment::class);
    }

    public function getUrlAttribute() {
        return route("candidates.show", $this->slug);
    }


    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = ucwords(strtolower($value));
        $this->attributes['slug'] = str_slug($value.'-candidacy-for-added-on'.time());
    }

    public function setPlaceNameAttribute($value)
    {
        $this->attributes['place_name'] = ucwords(strtolower($value));
    }

    public function setRunningAsAttribute($value)
    {
        $this->attributes['running_as'] = ucwords(strtolower($value));
    }

    public function setPoliticalPartyAttribute($value)
    {
        $this->attributes['political_party'] = ucwords(strtolower($value));
    }


}
