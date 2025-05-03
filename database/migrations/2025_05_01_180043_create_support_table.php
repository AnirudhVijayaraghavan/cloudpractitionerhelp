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
        Schema::create('supporttickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');              // the ticket creator

            $table->string('subject');
            $table->text('message');                  // the user’s detailed message
            $table->string('email')->index();         // for quick lookups / notifications

            // lifecycle fields
            $table->enum('status', ['open', 'pending', 'closed'])
                ->default('open')
                ->index();
            $table->enum('priority', ['low', 'normal', 'high'])
                ->default('normal');

            // // if you assign to an admin later
            // $table->foreignId('assigned_to')
            //     ->nullable()
            //     ->constrained('users')
            //     ->onDelete('set null');

            $table->timestamp('closed_at')
                ->nullable()
                ->comment('When an admin closed the ticket');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support');
    }
};
