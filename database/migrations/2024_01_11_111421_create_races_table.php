<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title');
            $table->longText('description');            
            $table->string('image_path')->default("https://i.imgur.com/0l5iiR7.png");
            $table->timestamps();
        });

        Schema::create('race_editions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_id')->constrained('races');
            $table->string('edition');
            $table->enum('district', [
                'aveiro', 'beja', 'braga', 'bragança', 'castelo_branco', 'coimbra',
                'evora', 'faro', 'guarda', 'leiria', 'lisboa', 'portalegre', 'porto',
                'santarem', 'setubal', 'viana_do_castelo', 'vila_real', 'viseu'
            ]);
            $table->timestamps();
        });

        Schema::create('race_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_id')->constrained('races');
            $table->foreignId('race_edition_id')->constrained('race_editions');
            $table->enum('type', ['kids', 'adults', 'seniors'])->default('adults');
            $table->enum('minimum_condition', ['beginner', 'experienced', 'advanced'])->default('beginner');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->date('date');
            $table->boolean('has_accessibility');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('races');
        Schema::dropIfExists('race_editions');
        Schema::dropIfExists('race_details');
    }
};