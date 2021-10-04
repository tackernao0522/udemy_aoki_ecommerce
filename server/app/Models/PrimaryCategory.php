<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryCategory;
use App\Models\Product;

class PrimaryCategory extends Model
{
    use HasFactory;

    public function secondary()
    {
        return $this->hasMany(SecondaryCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
