<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('email', 255)->unique();
            $table->string('pass');
            $table->date('data_naixement');

            $table->string('num_document')->unique();
            $table->string('telefon')->nullable();
            $table->string('adreca')->nullable();
            $table->string('ciutat')->nullable();
            $table->string('codi_postal')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->text('observacions')->nullable();
            $table->text('alergies')->nullable();
            $table->text('medicaments')->nullable();
            $table->text('antecedents')->nullable();
            $table->text('vacunes')->nullable();
            $table->string('metode_contacte')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};
