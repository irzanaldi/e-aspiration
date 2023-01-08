<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nobar extends Model
{
    use HasFactory;

    public $fillable = [
        'uuid',
        'name',
        'city',
        'price',
        'description',
        'location',
        'gmaps_latitude',
        'gmaps_longtitude',
        'date',
        'time',
        'id_tmdb',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
