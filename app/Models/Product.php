<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity',
        'description',
        'image',
        'meta_title',
        'meta_key',
        'meta_description',
        'status',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
