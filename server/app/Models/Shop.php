<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Product;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'information',
        'filename',
        'is_selling',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

// php artisan tinker
// $owner1 = App\Models\Owner::find(1)->shop;
// $owner1 = App\Models\Owner::find(1)->shop->name;
// App\Models\Shop::find(1)->owner
// App\Models\Shop::find(1)->owner->name
