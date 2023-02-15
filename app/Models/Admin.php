<?php

namespace App\Models;

use App\Enums\AdminLevel;
use App\Enums\AdminStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    public $fillable = [
        'uuid',
        'username',
        'password',
        'no_telp',
        'status',
        'level',
    ];

    public $casts = [
        'level' => AdminLevel::class,
        'status' => AdminStatus::class,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
