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
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('codigo', 100)->nullable();
            $table->string('unidade', 100)->nullable();
            $table->string('estoque_minimo', 100)->nullable();
            $table->string('estoque_maximo', 100)->nullable();
            $table->set('controlar_estoque', ['sim', 'nao']);
            $table->set('notificacao_estoque', ['sim', 'nao']);
            $table->set('tipo_insumo', ['sim', 'nao']);
            $table->set('perecivel', ['sim', 'nao']);
            $table->set('custo_com_valor_fixo', ['sim', 'nao']);
            $table->set('disponivel_para_venda', ['sim', 'nao']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //
        });
    }
};
