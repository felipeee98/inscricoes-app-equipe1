<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void

    {
        Schema::create('inscricao_historico', function (Blueprint $table) {
            $table->id();
            $table->string('observacao'); // Alterado de text para string
            $table->foreignId('inscricao_id')->constrained('inscricao');
            $table->foreignId('inscricao_status_id')->constrained('inscricao_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscricao_historico');
    }
}
;
