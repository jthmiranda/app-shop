<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoria',
        'name.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
        'description.min' => 'La descripcion corta solo admite hasta 250 caracteres'
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250'
    ];

    protected $fillable = ['name', 'description'];

    // $category->products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute() {

        if($this->image) {
            return '/images/categories/'.$this->image;
        }

        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/default-product-image.png';
    }
}
