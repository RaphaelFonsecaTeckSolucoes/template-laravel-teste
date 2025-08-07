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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->integer('idTipoEmpresa');
            $table->string('nome');
            $table->string('cnpj')->unique();
            $table->string('razaoSocial')->nullable();
            $table->string('nomeFantasia')->nullable();
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipo_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('descricao');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('empresa_contatos', function (Blueprint $table) {
            $table->uuid();
            $table->integer('idEmpresa');
            $table->integer('idTipoContato');
            $table->string('cpf_cnpj')->nullable();
            $table->string('titulo')->nullable();
            $table->string('nome')->nullable();
            $table->string('contato');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('empresa_enderecos', function (Blueprint $table) {
            $table->uuid();
            $table->integer('idEmpresa');
            $table->string('tipoResidencia');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('pais');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('convenio', function (Blueprint $table) {
            $table->id();
            $table->integer('idEmpresa');
            $table->string('qtdCaracteres');
            $table->timestamp('dataFechamentoFolha');
            $table->timestamp('dataRepasse');
            $table->string('sistemaConsignante');
            $table->string('representante');
            $table->string('site');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('consignataria', function (Blueprint $table){
            $table->id();
            $table->integer('idEmpresa');
            $table->string('status');
            $table->string('banco');
            $table->string('agencia');
            $table->string('conta');
            $table->string('instituicao');
            $table->string('smtpServer');
            $table->string('smtpPort');
            $table->string('smtpUser');
            $table->string('smtpPassword');
            $table->string('smtpSecurity')->nullable();
            $table->string('assinaturaEmail')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });

        Schema::create('convenio_contrato', function (Blueprint $table){
            $table->uuid();
            $table->integer('idConvenio');
            $table->integer('idConsignataria');
            $table->timestamp('dataFormalizacao');
            $table->timestamp('dataTermino');
            $table->string('statusRenovacao');
            $table->string('uf');
            $table->string('custoConvenioPorcentagem');
            $table->string('custoImplantacao');
            $table->string('custoAverbacao');
            $table->timestamp('dataPrimeiroVencimento');
            $table->string('custoAverbacaoPorcentagem');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fundos', function (Blueprint $table){
            $table->id();
            $table->integer('idEmpresa');
            $table->string('taxa');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fundo_regras', function (Blueprint $table){
            $table->id();
            $table->integer('idFundo');
            $table->integer('idAmbito');
            $table->string('valorMaxCessao');
            $table->string('idadeMin');
            $table->string('idadeMax');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fundo_regra_prazos', function (Blueprint $table){
            $table->id();
            $table->integer('idRegra');
            $table->integer('idPrazo');
            $table->string('coeficiente');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('prazos', function (Blueprint $table){
            $table->id();
            $table->integer('prazo');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fundo_regra_parcelas_min', function (Blueprint $table){
            $table->uuid();
            $table->integer('idRegra');
            $table->string('valor');
            $table->string('uf')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fundos_convenios', function (Blueprint $table){
            $table->uuid();
            $table->integer('idFundo');
            $table->string('idConvenio');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('tipo_empresa');
        Schema::dropIfExists('empresa_contatos');
        Schema::dropIfExists('empresa_enderecos');
        Schema::dropIfExists('convenio');
        Schema::dropIfExists('consignataria');
        Schema::dropIfExists('convenio_contrato');
        Schema::dropIfExists('fundos');
        Schema::dropIfExists('fundo_regras');
        Schema::dropIfExists('fundo_regra_prazos');
        Schema::dropIfExists('prazos');
        Schema::dropIfExists('fundo_regra_parcelas_min');
        Schema::dropIfExists('fundos_convenios');

    }
};
