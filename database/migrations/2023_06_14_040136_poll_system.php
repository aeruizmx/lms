<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('identifier');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('slug', 120);
            $table->text('description')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer', 100);
            $table->unsignedInteger('value')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('poll_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('location_id')->constrained();
            $table->foreignId('poll_id')->constrained();
            $table->unsignedInteger('reference');
            $table->unsignedInteger('ticket');
            $table->unsignedDouble('amount', 11, 2);
            $table->ipAddress();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['location_id', 'poll_id', 'reference', 'ticket']);
        });

        Schema::create('poll_result_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('poll_result_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->foreignId('answer_id')->constrained();
            $table->unsignedInteger('value')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['poll_result_id', 'question_id', 'answer_id']);
        });

        Schema::create('locations_has_polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('location_id')->constrained();
            $table->foreignId('poll_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['location_id', 'poll_id']);
        });

        Schema::create('polls_has_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('poll_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['poll_id', 'question_id']);
        });

        Schema::create('questions_has_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('question_id')->constrained();
            $table->foreignId('answer_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['question_id', 'answer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
