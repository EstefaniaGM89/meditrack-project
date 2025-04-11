<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla 'usuaris'
class CreateUsuarisTable extends Migration
{
    public function up()
    {
        Schema::create('usuaris', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('email', 255)->unique();
            $table->string('pass', 255);
            $table->date('data_naixement');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuaris');
    }
}

