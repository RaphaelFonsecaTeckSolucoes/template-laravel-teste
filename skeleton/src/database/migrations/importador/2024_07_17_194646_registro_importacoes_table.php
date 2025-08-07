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
        Schema::create('registro_importacoes', function (Blueprint $table) {
            $table->id();
            $table->text('nomeArquivo');
            $table->string('totalLinhas')->nullable();
            $table->string('totalProcessadas')->nullable();
            $table->dateTime('dataUpload');
            $table->text('url')->nullable();
            $table->text('status')->nullable();
            $table->integer('codUser')->nullable();
            $table->longText('erro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_importacoes');

    }
};
