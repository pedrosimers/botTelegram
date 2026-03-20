<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bot_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();

            $table->index('group');
            $table->index('key');
        });

        // Insert default settings
        DB::table('bot_settings')->insert([
            [
                'key' => 'vip_group_link',
                'value' => 'https://t.me/+2L5d3wTil7kzNmMx',
                'group' => 'telegram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'vip_group_id',
                'value' => '',
                'group' => 'telegram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'video_url',
                'value' => '',
                'group' => 'content',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'sales_pitch',
                'value' => '✨ <b>CURSO COMPLETO DE CROCHÊ</b> ✨

🔴 <b>ATENÇÃO</b>
Aprenda CROCHÊ do zero e comece a vender suas próprias peças artesanais!

💡 <b>INTERESSE</b>
Método simples e prático que qualquer pessoa consegue aprender, mesmo sem experiência prévia.

🔥 <b>DESEJO</b>
Centenas de alunas já estão faturando com crochê, criando peças exclusivas e vendendo online!

👇 <b>AÇÃO</b>
Escolha um plano abaixo para entrar no <b>Grupo VIP</b> e começar sua jornada:',
                'group' => 'content',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_settings');
    }
};
