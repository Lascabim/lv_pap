<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->default('');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->boolean('is_visual')->default(true);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo_path')->default("https://i.imgur.com/zHnSsR0.png");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
