<?php

namespace App\Models;

use App\Enums\LevelStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public $fillable = [
        'uuid',
        'name',
        'color',
    ];

    public $casts = [
        'name' => LevelStatus::class,
    ];
}
