<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected static function booting(){
        static::creating(function ($product) {
            if(blank($product->image)){
                $product->image = 'storage/images/products/defaultImg.jpg';
            }
            if (blank($product->uuid)){
                $product->uuid = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'name', 'description', 'SKU', 'image'
    ];
}
