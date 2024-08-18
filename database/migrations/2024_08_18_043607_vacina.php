<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasTable('vacina')) {
        Schema::create('vacina', function (Blueprint $table) {
            $table->id('vacinaId');
            $table->string('nomeVacina');
            $table->date('dataAplicacao');
            $table->date('proximaDose');
            $table->timestamps();
        });
    }
}

public function down()
{
    Schema::dropIfExists('vacina');
}

};
