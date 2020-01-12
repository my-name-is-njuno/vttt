<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'about', 'country_id'
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

    public function getAboutHtmlAttribute() {
        return \Parsedown::instance()->text($this->about);
    }


    public function getUrlAttribute() {
        return route("agendas.show", $this->id);
    }
}
