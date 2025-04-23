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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('track');                     // matches a key in config/education.php
            $table->string('title');
            $table->string('slug')->unique();            // for URLs
            $table->string('excerpt')->nullable();
            $table->text('body');                        // Markdown or HTML
            $table->integer('order')->default(0);        // for manual ordering
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
