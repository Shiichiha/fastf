<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function addons()
    {
        return $this->hasMany(ProductAddon::class);
    }
}
