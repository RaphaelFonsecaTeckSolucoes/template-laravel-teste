<?php

use App\Models\TabelaSimulacao\TabelaSimulacaoTipoPermissao;
use App\Models\TabelaSimulacao\TipoOperacao;

use App\Models\TabelaSimulacao;
use App\Models\TabelaSimulacao\TabelaSimulacaoGrupos;
use App\Models\TabelaSimulacao\TabelaSimulacaoModalidade;
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
        Schema::create('tabela_simulacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('id_convenio');
            $table->integer('id_consignataria');
            $table->integer('id_fundo');
            $table->integer('id_tipo_operacao');
            $table->integer('id_modalidade');
            $table->string('cod_tabela');
            $table->string('aprovacao')->default(1);
            $table->string('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tabela_simulacao_prazos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tabela_simulacao');
            $table->string('prazo');
            $table->string('fator');
            $table->string('tda');
            $table->string('taxa');
            $table->string('comissao_parceiro');
            $table->string('comissao_especial');
            $table->softDeletes();
            $table->timestamps();

            // Adicionando a chave estrangeira
            $table->foreign('id_tabela_simulacao')->references('id')->on('tabela_simulacao')->onDelete('cascade');
        });
      
        Schema::create('tabela_simulacao_grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        $payloadGrupo = [
            ["nome" => "FINANCEIRO"],
            ["nome" => "CALLCENTER"],
            ["nome" => "SISTEMAS"],
            ["nome" => "COMERCIAL"],
            ["nome" => "RH"],
            ["nome" => "PLANEJAMENTO"],
            ["nome" => "SUPERVIDOR OPERACIONAL"],
            ["nome" => "ANALISTA OPERACIONAL"],
            ["nome" => "SUPERVIDOR CALLCENTER"],
            ["nome" => "OPERACIONAL"],
        ];

        TabelaSimulacaoGrupos::insert($payloadGrupo);

      
        Schema::create('tabela_simulacao_tipo_permissao', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->comment('Tipo de Permissões Empresa, Grupos , Usuarios Especificos');
            $table->softDeletes();
            $table->timestamps();
        });

        $payloadTipoPermissao = [
            ["nome" => "empresa"],
            ["nome" => "grupos"],
            ["nome" => "usuarios"],
        ];

        TabelaSimulacaoTipoPermissao::insert($payloadTipoPermissao);

        Schema::create('tabela_simulacao_tipo_operacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        $payloadTipoOperacao = [
            ["nome" => "Empréstimo"],
            ["nome" => "Cartão de Crédito"],
            ["nome" => "Cartão Benefício"],
            ["nome" => "Previdência"],
        ];

        TipoOperacao::insert($payloadTipoOperacao);

        Schema::create('tabela_simulacao_permissao', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tabela_simulacao');
            $table->integer('id_tipo_permissao');
            $table->string('valor');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tabela_simulacao_modalidade', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        $payloadModalidades = [
            ["nome" => "Novo"],
            ["nome" => "Compra"],
        ];

        TabelaSimulacaoModalidade::insert($payloadModalidades);

        Schema::create('tabela_simulacao_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario')->nullable();
            $table->longText('json_ocorrencias');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabela_simulacao');
        Schema::dropIfExists('tabela_simulacao_prazos');
        Schema::dropIfExists('tabela_simulacao_grupos');
        Schema::dropIfExists('tabela_simulacao_tipo_operacao');
        Schema::dropIfExists('tabela_simulacao_tipo_permissao');
        Schema::dropIfExists('tabela_simulacao_permissao');
        Schema::dropIfExists('tabela_simulacao_modalidade');
        Schema::dropIfExists('tabela_simulacao_logs');
    }
};
