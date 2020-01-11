<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatecomment extends Model
{
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    
    public function getContentHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }
}
