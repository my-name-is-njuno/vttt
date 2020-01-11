<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
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

    public function getPromiseHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }
}
