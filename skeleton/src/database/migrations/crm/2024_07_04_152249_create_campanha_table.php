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
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();
            $table->integer('idEmpresa');
            $table->integer('idConvenio');
            $table->integer('idProduto');
            $table->integer('idTabulacao');
            $table->string('nome');
            $table->string('descricao');
            $table->string('validadeDias');
            $table->string('volta24h');
            $table->string('qtdAgendamentos');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('campanha_filtro', function (Blueprint $table) {
            $table->id();
            $table->integer('idCampanha');
            $table->integer('idFiltro');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('campanha_atendentes', function (Blueprint $table) {
            $table->id();
            $table->integer('idCampanha');
            $table->integer('idPessoa');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('campanha_tabulacao', function (Blueprint $table) {
            $table->id();
            $table->integer('idCampanha');
            $table->integer('idTabulacao');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tabulacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->string('global');
            $table->string('acaoEntrada');
            $table->string('statusEntrada');
            $table->string('acaoSaida');
            $table->string('statusSaida');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('campanha_tabulacao_telefone', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('campanha_lead', function (Blueprint $table) {
            $table->id();
            $table->integer('idCampanha');
            $table->string('cpf');
            $table->integer('idEquipe');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campanhas');
        Schema::dropIfExists('campanha_filtro');
        Schema::dropIfExists('campanha_atendentes');
        Schema::dropIfExists('campanha_tabulacao');
        Schema::dropIfExists('tabulacao');
        Schema::dropIfExists('campanha_tabulacao_telefone');
        Schema::dropIfExists('campanha_lead');

    }
};
