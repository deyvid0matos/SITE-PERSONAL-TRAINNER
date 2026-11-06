<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // Ex: Treino Personalizado
            $table->string('icon');        // Nome do ícone do Lucide (ex: 'dumbbell', 'zap')
            $table->text('description');   // Explicação curta do serviço
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};