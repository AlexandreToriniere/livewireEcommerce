<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // protected $table = "categories";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_key',
        'meta_description',
        'status',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

}
