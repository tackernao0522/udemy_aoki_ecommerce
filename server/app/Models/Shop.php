<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

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
}

// php artisan tinker
// $owner1 = App\Models\Owner::fint(1)->shop;
// $owner1 = App\Models\Owner::fint(1)->shop->name;
// App\Models\Shop::find(1)->owner
// App\Models\Shop::find(1)->owner->name
