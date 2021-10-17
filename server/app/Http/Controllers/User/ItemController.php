<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Stock;
use App\Models\PrimaryCategory;
use App\Mail\TestMail;
use App\Jobs\SendThankMail;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('item'); //shopのid取得
            if (!is_null($id)) { // null判定
                $itemId = Product::availableItems()->where('products.id', $id)->exists();
                if (!$itemId) {
                    abort(404); // 404画面表示 php artisan vendor:publish --tag=laravel-errors (カスタム)
                }
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // dd($request);

        // 同期的に送信
        // Mail::to(Auth::user()->email)->send(new TestMail());

        // 非同期に送信
        SendThankMail::dispatch();

        $categories = PrimaryCategory::with('secondary')
            ->get();
        $products = Product::availableItems()
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->paginate($request->pagination ?? '20');

        return view('user.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $quantity = Stock::where('product_id', $product->id)
            ->sum('quantity');

        if ($quantity > 9) {
            $quantity = 9;
        }

        return view('user.show', compact('product', 'quantity'));
    }
}
