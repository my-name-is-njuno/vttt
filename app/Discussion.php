<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

	protected $fillable = ['title','content'];

    public function user (){
        return $this->belongsTo(User::class);
    }


    public function setTitleAttribute($value) {
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }


    public function getUrlAttribute() {
    	return route('discussions.show', $this->slug);
    }

    public function getDiscussionCommentStatusAttribute() {
        if($this->comments > 0) {
            return true;
        }
        return false;
    }

    public function getDiscussionBestCommentStatusAttribute() {
        if($this->top_comment != null) {
            return true;
        }
        return false;
    }

    public function getContentHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }
}
