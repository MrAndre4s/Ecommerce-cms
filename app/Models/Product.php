<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends BaseModel
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'post_status' => PostStatus::class,
    ];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function productTags(): BelongsToMany
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tag', 'product_id', 'product_tag_id');
    }

    public function productCharacteristics(): BelongsToMany
    {
        return $this->belongsToMany(ProductCharacteristic::class, 'product_product_characteristic', 'product_id', 'product_characteristic_id');
    }
}
