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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nomeSocial')->nullable();
            $table->string('cpf')->unique();
            $table->string('dataNascimento')->nullable();
            $table->string('genero')->nullable();
            $table->string('nomeMae')->nullable();
            $table->string('nomePai')->nullable();
            $table->timestamps();
        });

        Schema::create('pessoa_contatos', function (Blueprint $table) {
            $table->id();
            $table->integer('idPessoa');
            $table->integer('idTipoContato');
            $table->string('contato');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pessoa_enderecos', function (Blueprint $table) {
            $table->id();
            $table->integer('idPessoa');
            $table->string('tipoResidencia');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('pais');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipo_contato', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('descricao');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pessoa_funcionario', function (Blueprint $table) {
            $table->id();
            $table->integer('idPessoa');
            $table->integer('idEmpresa');
            $table->integer('idSetor')->nulable();
            $table->integer('idCargo')->nulable();
            $table->string('matricula')->unique();
            $table->string('salario');
            $table->string('tipoContrato');
            $table->timestamp('dataAdmissao');
            $table->timestamp('dataDemissao');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
        Schema::dropIfExists('pessoa_contatos');
        Schema::dropIfExists('pessoa_enderecos');
        Schema::dropIfExists('tipo_contato');
        Schema::dropIfExists('pessoa_funcionario');
    }
};
