<?php

  /** Eu n sei como bota esse negocio direito, dscp
  **/
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
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_usuario', 45);
        });

        Schema::create('edital', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->date('data_inicio_inscr');
            $table->date('data_fim_inscr');
            $table->date('data_inicio_rev');
            $table->date('data_fim_rev');
        });

        Schema::create('inscricao_status', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            $table->rememberToken();
            $table->foreignId('tipo_usuario_id')->constrained('tipo_usuario'); 
        });

        Schema::create('candidato', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->foreignId('usuario_id')->constrained('usuario');
        });

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

        Schema::create('inscricao_historico', function (Blueprint $table) {
            $table->id();
            $table->text('observacao');
            $table->foreignId('inscricao_id')->constrained('inscricao');
            $table->foreignId('inscricao_status_id')->constrained('inscricao_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao_historico');
        Schema::dropIfExists('inscricao');
        Schema::dropIfExists('candidato');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('inscricao_status');
        Schema::dropIfExists('edital');
        Schema::dropIfExists('tipo_usuario');
    }
};
