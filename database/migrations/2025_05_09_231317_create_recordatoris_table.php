<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('recordatoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pacient_id')->constrained('pacients')->onDelete('cascade');
            $table->foreignId('medicament_id')->constrained('medicaments')->onDelete('cascade');
            $table->text('missatge');
            $table->date('inici');
            $table->date('fi')->nullable();
            $table->dateTime('data_hora')->nullable();
            $table->time('hora')->nullable();
            $table->text('dies_setmana')->nullable();
            $table->enum('estat', ['pendent', 'completat'])->default('pendent');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('recordatoris');
    }
};
