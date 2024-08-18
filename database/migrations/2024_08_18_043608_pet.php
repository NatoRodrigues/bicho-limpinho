<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();  
            $table->string('nome');
            $table->date('dataNascimento');
            $table->string('tipoAnimal');
            $table->string('raca');
            $table->timestamps();
        });
    }
public function down()
{
    Schema::dropIfExists('pet');
}

};
