<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('library_resources', function (Blueprint $table) {
            $table->string('shelf')->nullable(); // ✅ Add shelf column
        });
    }

    public function down(): void
    {
        Schema::table('library_resources', function (Blueprint $table) {
            $table->dropColumn('shelf'); // ✅ Rollback shelf column if needed
        });
    }
};
