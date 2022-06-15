<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\True_;

class Product extends Model
{
    use HasFactory;

    // $product->category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // $product->image
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute() {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage) {
            $featuredImage = $this->images()->first();
        }

        if($featuredImage) {
            return $featuredImage->url;
        }

        return '/images/products/default-product-image.png';
    }

    public function getCategoryNameAttribute() {
        if ($this->category)
            return $this->category->name;

        return 'General';
    }
}
