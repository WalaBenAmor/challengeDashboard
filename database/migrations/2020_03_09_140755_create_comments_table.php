<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Challenge;
use App\Participant;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->text('content');
            // $table->integer('challenge_id');
            // $table->foreign('challenge_id')->unsigned()->references('id')->on('challenges');
            $table->unsignedInteger('challenge_id');
            // $table->integer('participant_id');
            // $table->foreign('participant_id')->unsigned()->references('id')->on('participants');
            $table->unsignedInteger('participant_id');
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
        Schema::dropIfExists('comments');
    }
}
