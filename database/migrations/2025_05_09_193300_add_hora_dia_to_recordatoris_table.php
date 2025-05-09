<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('recordatoris', function (Blueprint $table) {
            $table->time('hora')->nullable()->after('data_hora');
            $table->string('dia_setmana', 15)->nullable()->after('hora');
        });
    }

    public function down()
    {
        Schema::table('recordatoris', function (Blueprint $table) {
            $table->dropColumn(['hora', 'dia_setmana']);
        });
    }

};
