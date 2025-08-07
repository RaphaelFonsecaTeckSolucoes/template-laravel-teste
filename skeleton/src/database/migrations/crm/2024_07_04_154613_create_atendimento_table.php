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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->uuid();
            $table->integer('idEmpresa');
            $table->string('cpf');
            $table->integer('idCampanha');
            $table->integer('idAtendente');
            $table->integer('idTabulacao');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_telefones', function (Blueprint $table) {
            $table->uuid();
            $table->integer("idUser");
            $table->integer('idAtendimento');
            $table->integer('idContato');
            $table->integer('idTabulacaoTelefone');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_propostas', function (Blueprint $table) {
            $table->uuid();
            $table->string('atendimento');
            $table->string('tabela');
            $table->string('consignataria');
            $table->string('convenio');
            $table->string('fundo');
            $table->string('coeficiente');
            $table->string('taxa');
            $table->string('autorizacaoTabela');
            $table->string('comentario');
            $table->string('seguro');
            $table->string('liberacao');
            $table->string('tipoOperacao');
            $table->string('valorTotalContratado');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_proposta_dividas', function (Blueprint $table) {
            $table->uuid();
            $table->string('idProposta');
            $table->string('contrato');
            $table->string('prazo');
            $table->string('valorParcela');
            $table->string('valorDivida');
            $table->string('novoPrazo');
            $table->string('valorLiberacao');
            $table->string('seguro');
            $table->string('valorContrato');
            $table->string('codigoBanco');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_logs', function (Blueprint $table) {
            $table->uuid();
            $table->string('cpf');
            $table->integer('idCampanha');
            $table->integer('idAtendente');
            $table->integer('idTabulacao');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_expedicao_transportes', function (Blueprint $table) {
            $table->uuid();
            $table->string("nome");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_expedicao_whatsapps', function (Blueprint $table) {
            $table->uuid();
            $table->string("nome");
            $table->string("numero");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('atendimento_expedicoes', function (Blueprint $table) {
            $table->uuid();
            $table->string('idAtendimento');
            $table->timestamp('dataAgendamento');
            $table->integer("idTransporte");
            $table->integer("idWhatsapp");
            $table->text('observacao')->nullable();
            $table->softDeletes();
            $table->timestamps();
        }); 

        Schema::create('atendimento_ficha_cadastral', function (Blueprint $table) {
            $table->uuid();
            $table->string('idAtendimento');
            $table->string('cpf');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('nome_mae');
            $table->string('nome_pai')->nullable();
            $table->string('genero');
            $table->string('nacionalidade');
            $table->string('naturalidade')->nullable();
            $table->string('uf_naturalidade', 2)->nullable();
            $table->string('estado_civil');
            $table->string('rg');
            $table->string('rg_orgao_expedidor')->nullable();
            $table->string('rg_uf', 2)->nullable();
            $table->string('email');
            $table->string('telefone_residencial')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
        Schema::dropIfExists('atendimento_telefones');
        Schema::dropIfExists('atendimento_propostas');
        Schema::dropIfExists('atendimento_proposta_dividas');
        Schema::dropIfExists('atendimento_logs');
        Schema::dropIfExists('atendimento_expedicao_transportes');
        Schema::dropIfExists('atendimento_expedicao_whatsapps');
        Schema::dropIfExists('atendimento_expedicoes');
        Schema::dropIfExists('atendimento_ficha_cadastral');
    }
};
