<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');       // Associated quiz
            $table->foreignId('question_id')->constrained()->onDelete('cascade');   // Associated question
            $table->string('user_answer')->nullable();       // User's submitted answer
            $table->boolean('is_correct')->default(false);    // Whether the answer is correct
            $table->integer('order')->nullable();             // Order in which the question appeared
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
