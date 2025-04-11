<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla 'recordatoris'
class CreateRecordatorisTable extends Migration
{
    public function up()
    {
        Schema::create('recordatoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuaris_id')->constrained('usuaris')->onDelete('cascade');
            $table->foreignId('medicaments_id')->constrained('medicaments')->onDelete('cascade');
            $table->text('missatge');
            $table->dateTime('data_hora');
            $table->enum('estat', ['pendent', 'completat']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recordatoris');
    }
}