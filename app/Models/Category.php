<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'min_age',
        'max_age'
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
