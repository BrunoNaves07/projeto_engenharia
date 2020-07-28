<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('cnpj', 45);
            $table->string('logradouro', 150);
            $table->string('numero', 45);
            $table->string('bairro', 150);
            $table->string('cep', 45);
            $table->string('cidade', 150);
            $table->string('estado', 45);
            $table->string('telefone', 45);
            $table->string('email', 150);
            $table->string('site', 100);
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
        Schema::dropIfExists('editoras');
    }
}
