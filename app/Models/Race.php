<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district',
        'title',
        'description',
        'minimum_condition',
        'start_time',
        'end_time',
        'date',
        'has_accessibility',
        'image_path',
    ];

    public function editions() {
        return $this->hasMany(RaceEdition::class);
    }
}
