<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'description',
        'stock',
        'category_id'
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
