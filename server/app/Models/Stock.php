<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 't_stocks'; // table名を変更
}

// php artisan tinker
// $product = App\Models\Product
// $product::find(1)->stocks->sum('quantity')
// 8
