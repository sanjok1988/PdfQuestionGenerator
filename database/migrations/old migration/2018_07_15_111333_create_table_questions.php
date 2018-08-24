<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('question');   
            $table->string('difficulty_level'); 
            $table->integer('assigned_mark');

            $table->integer('chapter_id')->unasigned()->index();
            $table->foreign('chapter_id')->references('chapter_id')->on('chapters')->onDelete('cascade');

            $table->string('course_code')->unasigned()->index();
            $table->foreign('course_code')->references('course_code')->on('courses')->onDelete('cascade');

        
            $table->string('question_type');
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
        Schema::drop('questions');
    }
}
