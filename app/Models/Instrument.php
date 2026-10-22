<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'price',
        'description',
        'image',
        'type',
    ];

    protected $casts = [
        'price' => 'integer',
    ];
}
