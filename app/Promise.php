<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    protected $fillable = [
        'country_id', 'promises'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getPromisesHtmlAttribute() {
        return \Parsedown::instance()->text($this->promises);
    }

    public function getUrlAttribute() {
        return route("promises.show", $this->id);
    }
}
