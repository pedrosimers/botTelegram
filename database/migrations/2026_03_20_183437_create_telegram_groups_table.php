<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telegram_groups', function (Blueprint $table) {
            $table->id();
            $table->string('telegram_group_id')->unique();
            $table->string('name');
            $table->string('type')->default('group'); // group, channel
            $table->string('visibility')->default('private'); // public, private
            $table->string('username')->nullable();
            $table->string('invite_link')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index('telegram_group_id');
            $table->index('active');
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telegram_groups');
    }
};
