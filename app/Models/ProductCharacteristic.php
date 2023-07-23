<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCharacteristic extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
