<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->nullable()->constrained();
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('pending'); // pending, paid, failed, refunded
            $table->string('txid')->nullable()->unique();
            $table->string('correlation_id')->nullable()->unique();
            $table->string('payment_method')->default('pix');
            $table->text('pix_qrcode')->nullable();
            $table->text('pix_copy_paste')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->index(['user_id', 'status']);
            $table->index('status');
            $table->index('correlation_id');
            $table->index('txid');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
