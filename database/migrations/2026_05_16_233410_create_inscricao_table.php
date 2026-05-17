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
        Schema::create('inscricao', function (Blueprint $table) {
            $table->id();
            $table->string('caminho_fica_inscricao');
            $table->string('caminho_identidade');
            $table->string('caminho_diploma');
            $table->string('caminho_curriculo_lattes');
            $table->string('caminho_comprovante_eleitoral');
            $table->string('caminho_certificado_militar');
            $table->tinyInteger('vaga_pcd');
            $table->tinyInteger('vaga_pniq');
            $table->foreignId('edital_id')->constrained('edital');
            $table->foreignId('candidato_id')->constrained('candidato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao');
    }
};
