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
        Schema::create('member_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_id')->constrained('races');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('pendent')->default(true);
            $table->boolean('switch')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_lists');
    }
};
