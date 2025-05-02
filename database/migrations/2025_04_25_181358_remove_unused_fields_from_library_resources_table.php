<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnusedFieldsFromLibraryResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('library_resources', function (Blueprint $table) {
            $table->dropColumn(['keywords', 'type', 'location', 'file_path']);
        });
    }

    public function down()
    {
        Schema::table('library_resources', function (Blueprint $table) {
            $table->string('keywords')->nullable();
            $table->string('type')->nullable();
            $table->string('location')->nullable();
            $table->string('file_path')->nullable();
        });
    }
}