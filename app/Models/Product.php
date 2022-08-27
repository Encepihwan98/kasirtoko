<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Unit;
use Category;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the unit associated with the product.
     */
    public function unit()
    {
        return $this->hasOne(Unit::class);
    }

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
