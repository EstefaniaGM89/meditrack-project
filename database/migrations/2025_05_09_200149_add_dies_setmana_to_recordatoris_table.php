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
            $table->json('dies_setmana')->nullable()->after('data_hora');
        });
    }

    public function down()
    {
        Schema::table('recordatoris', function (Blueprint $table) {
            $table->dropColumn('dies_setmana');
        });
    }
};
