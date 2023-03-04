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
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->set('tipo', ['entrada', 'saida']);
            $table->string('produto_id', 50)->nullable();
            $table->string('valor', 200)->nullable();
            $table->string('quantidade', 200)->nullable();
            $table->string('motivo', 200)->nullable();
            $table->timestamp('datahora')->useCurrent();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
};
