<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Participant;
use App\Challenge;
class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->text('content');  
            $table->integer('participant_id');
            $table->foreign('participant_id')->unsigned()->references('id')->on('users');
            $table->integer('challenge_id');
            $table->foreign('challenge_id')->unsigned()->references('id')->on('challenges');
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
        Schema::dropIfExists('codes');
    }
}
