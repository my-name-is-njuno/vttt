<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('country_id');
            $table->string('slug')->nullable();
            $table->string('place_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('dob')->nullable();
            $table->text('political_party')->nullable();
            $table->text('running_as')->nullable();
            $table->boolean('self_nominated')->default(1);
            $table->unsignedInteger('votes_against_count')->default(0);
            $table->unsignedInteger('votes_for_count')->default(0);
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('support_count')->default(0);
            $table->unsignedInteger('candidate_reviews_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
