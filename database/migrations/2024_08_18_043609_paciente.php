<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id('pacienteId')->unsigned()->autoIncrement(); // Altera para int
            $table->string('nome');
            $table->date('dataNascimento');
            $table->foreignId('tutorId')->constrained('tutor')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
};