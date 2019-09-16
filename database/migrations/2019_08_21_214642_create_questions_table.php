<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sondage_id');
            $table->unsignedInteger('question_number');
            $table->enum('question_type', ['A', 'B', 'C']);
            $table->string('question', 255);
            $table->string('available_answer', 255)->nullable();
            $table->boolean('is_email')->default(false);
            $table->timestamps();

            $table->foreign('sondage_id')->references('id')->on('sondages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
