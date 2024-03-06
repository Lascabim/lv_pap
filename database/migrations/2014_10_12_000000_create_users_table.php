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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->enum('sex', ['male', 'female' ])->nullable();
            $table->boolean('is_visual')->default(true);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->default("https://i.imgur.com/zHnSsR0.png");
            $table->enum('district', [
                'aveiro', 'beja', 'braga', 'bragança', 'castelo_branco', 'coimbra',
                'evora', 'faro', 'guarda', 'leiria', 'lisboa', 'portalegre', 'porto',
                'santarem', 'setubal', 'viana_do_castelo', 'vila_real', 'viseu'
            ])->nullable();
            $table->boolean('is_profile_public')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};