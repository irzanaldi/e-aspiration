<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    public $fillable = [
        'uuid',
        'bill_id',
        'color',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
