<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
{
    Schema::create('tutor', function (Blueprint $table) {
        $table->id('id');
        $table->string('nome');
        $table->string('endereco');
        $table->string('telefone');
        $table->string('cpf')->unique();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tutor');
}

};
