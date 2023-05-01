<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
// use App\Http\Resources\v1\Product as ProductResource;
use App\Http\Resources\v1\ProductCollection;

class ProductController extends Controller
{
    public function index(){
        // $products = Product::take(1)->first();
        $products = Product::all();
        return new ProductCollection($products);
        // return ProductResource::collection($products);
        // return response()->json($products);
        // return new ProductResource($products);  // column filter works only for one result
    }
}
