<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickCount extends Model
{
    use HasFactory;

    public $fillable = [
        'created_by',
        'location_id',
        'qty',
        'image',
    ];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
