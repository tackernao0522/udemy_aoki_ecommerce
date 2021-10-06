<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Image;
use App\Models\Owner;
use App\Models\PrimaryCategory;
use App\Models\Shop;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('product'); //shopのid取得
            if (!is_null($id)) { // null判定
                $productsOwnerId = Product::findOrFail($id)->shop->owner->id;
                $productId = (int)$productsOwnerId; // キャスト 文字列→数値に型変換 $ownerId = Auth::id();
                if ($productId !== Auth::id()) { // 同じでなかったら
                    abort(404); // 404画面表示 php artisan vendor:publish --tag=laravel-errors (カスタム)
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $products = Owner::findOrFail(Auth::id())->shop->products;
        $ownerInfo = Owner::with('shop.products.imageFirst')
            ->where('id', Auth::id())->get(); // Eager Load
        // dd($ownerInfo);
        // foreach($ownerInfo as $owner) {
        //     // dd($owner->shop->products);
        //     foreach($owner->shop->products as $product) {
        //         dd($product->imageFirst->filename);
        //     }
        // }

        return view('owner.products.index', compact('ownerInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::where('owner_id', Auth::id())
            ->select('id', 'name')->get();

        $images = Image::where('owner_id', Auth::id())
            ->select('id', 'title', 'filename')
            ->orderBy('updated_at', 'DESC')->get();

        $categories = PrimaryCategory::with('secondary')->get();
        // dd($shops, $images, $categories);

        return view('owner.products.create', compact(
            'shops',
            'images',
            'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}