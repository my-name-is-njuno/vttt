<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function discussions() {
        return $this->hasMany(Discussion::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function candidates() {
        return $this->hasMany(Candidate::class);
    }

    public function agendas() {
        return $this->hasMany(Agenda::class);
    }

    public function promises() {
        return $this->hasMany(Promise::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function votes() {
        return $this->hasMany(Vote::class);
    }

    public function getUrlAttribute() {
        return route("users.show", $this->id);
    }

    public function getVotedForAttribute($candidate) {
        $vote = App\Vote::where('candidate_id', '=', $candidate->id)->first();
        if ($vote) {
            return $vote;
        } else {
            return false;
        }
    }

}
