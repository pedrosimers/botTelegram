<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('emoji')->default('📦');
            $table->integer('duration_hours');
            $table->decimal('price', 10, 2);
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('active');
            $table->index('sort_order');
        });

        // Insert default plans
        DB::table('plans')->insert([
            [
                'name' => 'Acesso 2 horas',
                'emoji' => '⚡',
                'duration_hours' => 2,
                'price' => 5.99,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acesso 5 dias',
                'emoji' => '🧶',
                'duration_hours' => 120,
                'price' => 19.99,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acesso 30 dias',
                'emoji' => '🧶',
                'duration_hours' => 720,
                'price' => 49.99,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
