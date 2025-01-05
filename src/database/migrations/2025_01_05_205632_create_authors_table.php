<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();                 // Primary key: 'id'
            $table->string('name');       // Column for the author's name
            $table->timestamp('created_at')->nullable(); // Adds 'created_at'
            $table->timestamp('updated_at')->nullable(); // Adds 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors'); // Drops the 'authors' table if it exists
    }
};
