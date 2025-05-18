<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('personal_sanitari', function (Blueprint $table) {
            $table->string('cognoms')->after('nom')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('personal_sanitari', function (Blueprint $table) {
            $table->dropColumn('cognoms');
        });
    }
};
