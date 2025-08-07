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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf')->unique();
            $table->string('nome')->nullable();
            $table->string('nomeSocial')->nullable();
            $table->timestamp('dataNascimento')->nullable();
            $table->string('genero')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('ufNaturalidade')->nullable();
            $table->string('rg')->unique()->nullable();
            $table->string('orgaoEmissor')->nullable();
            $table->string('ufOrgaoEmissor')->nullable();
            $table->timestamp('dataEmissao')->nullable();
            $table->timestamp('dataUltimaConsultaBureau')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->integer('idDadosComplementares')->nullable();
            $table->integer('idTipoContato');
            $table->string('contato')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['idCliente', 'contato']);
        });

        schema::create('cliente_dados_bancarios', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->string('tipoConta')->nullable();
            $table->string('banco')->nullable();
            $table->string('codigoBanco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->string('tipoResidencia')->nullable();
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['idCliente', 'logradouro'], 'unique_address_client');
        });

        schema::create('cliente_dados_profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('idCliente');
            $table->string('matriculaInstitucional')->nullable();
            $table->string('matriculaPensionista')->nullable();
            $table->string('empresa')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('razaoSocial')->nullable();
            $table->string('nomeFantasia')->nullable();
            $table->string('setor')->nullable();
            $table->string('ramoAtividade')->nullable();
            $table->string('orgao')->nullable();
            $table->string('tipoContrato')->nullable();
            $table->string('regimeJuridico')->nullable();
            $table->string('situacaoFuncional')->nullable();
            $table->string('upag')->nullable();
            $table->string('cargo')->nullable();
            $table->string('cargoSigla')->nullable();
            $table->string('remuneracao')->nullable();
            $table->timestamp('dataAdmissao')->nullable();
            $table->string('senhaPortal')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_dados_complementares', function (Blueprint $table){
            $table->id();
            $table->string('idCliente');
            $table->integer('idTipoDadoComplementar');
            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->timestamp('dataNascimento')->nullable();
            $table->string('profissao')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });

        schema::create('cliente_tipo_complemento', function (Blueprint $table){
            $table->id();
            $table->string('descricao');
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_documentos', function (Blueprint $table){
            $table->id();
            $table->string('idCliente');
            $table->integer('idTipoDocumento');
            $table->string('urlS3');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_tipo_documento', function (Blueprint $table){
            $table->id();
            $table->string('descricao');
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_margens', function (Blueprint $table){
            $table->id();
            $table->integer('idDadosProfissionais');
            $table->string('idTipoMargem');
            $table->string('valor');
            $table->softDeletes();
            $table->timestamps();
        });

        schema::create('cliente_tipo_margem', function (Blueprint $table){
            $table->id();
            $table->string('descricao');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cliente_contatos');
        Schema::dropIfExists('cliente_dados_bancarios');
        Schema::dropIfExists('cliente_enderecos');
        Schema::dropIfExists('cliente_dados_profissionais');
        Schema::dropIfExists('cliente_dados_complementares');
        Schema::dropIfExists('cliente_tipo_complemento');
        Schema::dropIfExists('cliente_documentos');
        Schema::dropIfExists('cliente_tipo_documento');
        Schema::dropIfExists('cliente_margens');
        Schema::dropIfExists('cliente_tipo_margem');
    }
};
