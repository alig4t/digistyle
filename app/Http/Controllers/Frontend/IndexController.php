<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class IndexController extends Controller
{
    public function index(){


        $products = Product::with('photos','stocks.color','stocks.size')
        ->whereHas('stocks')
        ->orderby('id','desc')
        ->limit(7)        
        ->get();

        // return $products;

        $brands = Brand::HomePageBrands();

        $category_product = Product::ProductCategoryAll();
       
        return view('frontend.index',compact(['products','category_product','brands']));
    }
    
}
