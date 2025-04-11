<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla 'dades_salut'
class CreateDadesSalutTable extends Migration
{
    public function up()
    {
        Schema::create('dades_salut', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuari_id')->constrained('usuaris')->onDelete('cascade');
            $table->string('tipus_dada', 100);
            $table->decimal('valor', 10, 2);
            $table->string('unitats', 50);
            $table->timestamp('data_registre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dades_salut');
    }
}
