<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'agendas', 'country_id'
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

    public function getAgendasHtmlAttribute() {
        return \Parsedown::instance()->text($this->agendas);
    }


    public function getUrlAttribute() {
        return route("agendas.show", $this->id);
    }



}
