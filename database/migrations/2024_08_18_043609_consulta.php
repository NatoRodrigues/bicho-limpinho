<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->id('consultaId')->unsigned()->autoIncrement(); // Altera para int
            $table->date('dataConsulta');
            $table->time('horaConsulta');
            $table->unsignedInteger('pacienteId'); // Altera para int
            $table->string('status');
            $table->timestamps();

           
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('consulta');
    }
};
