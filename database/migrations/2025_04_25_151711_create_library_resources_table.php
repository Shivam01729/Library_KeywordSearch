<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('library_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->text('keywords'); // For keyword storage
            $table->string('type'); // book, journal, article, etc.
            $table->string('location');
            $table->string('file_path')->nullable(); // For digital resources
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('library_resources');
    }
};