<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_complementares', function (Blueprint $table) {
            $table->id();

            $table->text('relevancia')->nullable();
            $table->text('justificativa')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('resumo')->nullable();
            $table->unsignedBigInteger('solicitacao_id');

            $table->foreign('solicitacao_id')->references('id')->on('solicitacaos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_complementares');
    }
};
