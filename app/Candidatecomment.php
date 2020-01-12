<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatecomment extends Model
{
    protected $fillable = [
        'candidate_id', 'content', 'comment_type'
    ];


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


    public function getUrlAttribute() {
        return route("candidatecomments.show", $this->id);
    }

    public function votes() {
        return $this->hasMany(Vote::class);
    }
}
