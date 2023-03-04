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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 500)->nullable();
            $table->string('imagem', 800)->nullable();
            $table->string('categoria', 100)->nullable();
            $table->string('subcategoria', 100)->nullable();
            $table->string('unit', 100)->nullable();
            $table->string('ncm', 100)->nullable();
            $table->string('cest', 100)->nullable();
            $table->string('origem', 100)->nullable();
            $table->string('cfop', 100)->nullable();
            $table->string('icms', 100)->nullable();
            $table->string('ipi', 100)->nullable();
            $table->string('pis', 100)->nullable();
            $table->string('cofins', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
