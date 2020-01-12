<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('update-discussion', function($user, $discussion) {
            return $user->id == $discussion->user_id;
        });
        Gate::define('delete-discussion', function($user, $discussion) {
            return $user->id == $discussion->user_id;
        });



        Gate::define('delete-candidate', function($user, $candidate) {
            return $user->id == $candidate->user_id;
        });
        Gate::define('update-candidate', function($user, $candidate) {
            return $user->id == $candidate->user_id;
        });



        Gate::define('delete-comment', function($user, $comment) {
            return $user->id == $comment->user_id;
        });
        Gate::define('update-comment', function($user, $comment) {
            return $user->id == $comment->user_id;
        });



        Gate::define('delete-post', function($user, $post) {
            return $user->id == $post->user_id && $post->candidates->count() < 1;
        });
        Gate::define('update-post', function($user, $post) {
            return $user->id == $post->user_id;
        });



        Gate::define('delete-promise', function($user, $promise) {
            return $user->id == $promise->user_id && $promise->candidatecomments->count() < 1;
        });
        Gate::define('update-promise', function($user, $promise) {
            return $user->id == $promise->user_id;
        });



        Gate::define('delete-agenda', function($user, $agenda) {
            return $user->id == $agenda->user_id && $agenda->candidatecomments->count() < 1;
        });
        Gate::define('update-agenda', function($user, $agenda) {
            return $user->id == $agenda->user_id;
        });


    }
}
