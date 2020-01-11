<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function getContentHtmlAttribute() {
        return \Parsedown::instance()->text($this->content);
    }

    public static function boot()
    {
        # code...
        parent::boot();
        static::created(function($comment) {
            $comment->discussion->increment('comments_count');
            $comment->discussion->save();
        });


    }
}
