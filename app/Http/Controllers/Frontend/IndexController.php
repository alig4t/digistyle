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
        $products = Product::with('photos')
        ->orderby('id','desc')
        ->limit(7)
        ->get();

       
         $cats = Category::with(['childrenRecursive'])
        ->where('parent_id',0)
        ->get();


        $category_ids = [6,21,22];
        foreach($category_ids as $key=>$cid){
            $category_product[$key] = Product::with('photos')
            ->where('category_id',$cid)
            ->orderby('id','desc')
            ->limit(5)
            ->get();
        }

        $brands = Brand::orderby('id','desc')->limit(12)->get();
        // return $brands;
        // return $category_product;


        return view('frontend.index',compact(['products','cats','category_product','brands']));
    }
}
