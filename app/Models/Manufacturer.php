<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends BaseModel
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'post_status' => PostStatus::class,
    ];
}
