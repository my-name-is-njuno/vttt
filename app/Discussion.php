<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

	protected $fillable = ['avatar','title','content'];

    public function user {
        return $this->belongsTo(User:class);
    }


    public function setTitleAttribute($value) {
    	$this->attributes['title'] = $value;
    	$this->slug = str_slug($value);
    }
}
