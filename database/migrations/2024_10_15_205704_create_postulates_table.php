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
        Schema::create('postulates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprentice_id')->constrained('apprentices')->onDelete('cascade');
            $table->string('card');
            $table->boolean('isEnabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulates');
    }
};