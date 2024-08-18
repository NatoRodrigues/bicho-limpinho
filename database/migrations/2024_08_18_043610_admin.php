<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
{
    Schema::create('admin', function (Blueprint $table) {
        $table->id('adminId');
        $table->string('adminUsername');
        $table->string('adminPassword');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('admin');
}
};
