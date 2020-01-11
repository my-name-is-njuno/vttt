<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function($u) {
        	$u->discussions()
        	->saveMany(
        		factory(App\Discussion::class, rand(1,20))->make()
            )
            ->each(function($c) {
                $c->comments()->saveMany(
                    factory(App\Comment::class, rand(2,27))->make()
                );
            });
        });
    }
}
