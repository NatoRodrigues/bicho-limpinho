<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
{
    Schema::create('ficha_acompanhamento', function (Blueprint $table) {
        $table->id('fichaId');
        $table->foreignId('petId')->constrained('pet')->onDelete('cascade');
        $table->text('consulta'); 
        $table->text('vacina'); 
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('ficha_acompanhamento');
}

};
