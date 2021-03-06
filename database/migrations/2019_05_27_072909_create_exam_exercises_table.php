<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_exercises', function (Blueprint $table) {
            $table->primary(['exam_id', 'exerciseset_id']);
            $table->integer('exerciseset_id');
            $table->foreign('exerciseset_id')->references('id')->on('exercisesets');
            $table->integer('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams');
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
        Schema::dropIfExists('exam_exercises');
    }
}
