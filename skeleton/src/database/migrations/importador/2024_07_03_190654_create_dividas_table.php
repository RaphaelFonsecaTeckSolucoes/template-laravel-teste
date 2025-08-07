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
        Schema::create('dividas', function (Blueprint $table) {
            $table->id();
            $table->string('idConvenio');
            $table->string('idMatricula');
            $table->string('idBanco');
            $table->string('valorParcela');
            $table->string('modoCalculo');
            $table->string('taxa');
            $table->string('valorSaldo');
            $table->string('referenciaSaldo');
            $table->string('terminoContrato');
            $table->string('parcelasPagas')->nullable();
            $table->string('parcelasTotal')->nullable();
            $table->string('contrato')->unique();
            $table->timestamp('vegencia')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('divida_bancos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('divida_rubricas', function (Blueprint $table) {
            $table->id();
            $table->integer('idBanco');
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        // TODO - Criar tabela de documentos das dividas
        Schema::create("divida_documentos", function (Blueprint $table) {
            $table->id();
            $table->integer("idDivida");
            $table->string("origem");
            $table->string("tipo");
            $table->string("caminhoArquivo");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividas');
        Schema::dropIfExists('divida_bancos');
        Schema::dropIfExists('divida_rubricas');
    }
};
