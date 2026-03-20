<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained();
            $table->foreignId('payment_id')->nullable()->constrained();
            $table->string('status')->default('active'); // active, expired, cancelled
            $table->timestamp('started_at');
            $table->timestamp('expires_at');
            $table->timestamps();

            // Indexes for performance
            $table->index(['user_id', 'status', 'expires_at']);
            $table->index('status');
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
