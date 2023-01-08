<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public $fillable = [
        'uuid',
        'code',
        'nobar_id',
        'user_id',
    ];

    public function nobar()
    {
        return $this->belongsTo(Nobar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
