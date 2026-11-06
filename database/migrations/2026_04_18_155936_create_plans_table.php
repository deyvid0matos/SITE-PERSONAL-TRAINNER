<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Ex: Plano Caveira
            $table->text('description');     // O que o aluno recebe
            $table->decimal('price', 10, 2); // Valor do plano
            $table->string('checkout_url');  // Link de pagamento (Hotmart, Eduzz, etc)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};