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
        Schema::create('race_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_id')->constrained('races');
            $table->foreignId('guide_id')->constrained('users');
            $table->foreignId('athlet_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_matches');
    }
};
