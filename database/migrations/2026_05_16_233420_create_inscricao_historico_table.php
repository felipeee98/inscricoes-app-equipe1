<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historico_inscricoes', function (Blueprint $table) {
            $table->id();
            $table->string('observacao');
            $table->foreignId('inscricao_id')->constrained('inscricao');
            $table->foreignId('inscricao_status_id')->constrained('inscricao_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_inscricoes');
    }
};
