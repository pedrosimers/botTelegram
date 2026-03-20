<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('telegram_message_id');
            $table->string('type')->default('text');
            $table->text('content')->nullable();
            $table->text('response')->nullable();
            $table->json('raw_data')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index('telegram_message_id');
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
