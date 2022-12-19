<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    
    public function show($slug){
        $product = Product::with(['photos','attributeValues','category.attributeGroups','brand'])
        ->where('slug',$slug)
        ->first();

        $category = Category::with('parent')
        ->where('id',$product->category_id)
        ->first();

        // return $category;

        $related = Product::with('photos')->where('category_id',$category->id)->limit(8)->get();
        
        $breadcrumbCats = $category->breadcrumb($category);


       $array_gp = [];

        foreach($product->AttributeValues as $att_val){
            $gp = $att_val->attr_groups->title;
            $val = $att_val->title;
            if(array_key_exists($gp , $array_gp)){
                array_push($array_gp[$gp], $val);
            }else{
                $array_gp[$gp] = [$val];
            }
        }
      
        $cats = Category::with(['childrenRecursive'])
        ->where('parent_id',0)
        ->get();

        $brands = Brand::all();

        return view('frontend.showproduct',compact([
            'product',
            'cats',
            'brands',
            'category',
            'breadcrumbCats',
            'array_gp',
            'related',
        ]));
    }
    
    public function category_show(Request $request,$slug){

        // dd($request->getQueryString());
        // dd($request->url());
        // dd(request()->has('sortby'));
        // dd(request()->query()->merge(['sort_by'=>'favorite']));
        // dd(request()->merge(['attr'=> ])->query());
        // dd($request->getPathInfo() . ($request->getQueryString() ? ('?' . $request->getQueryString()) : ''));

        $query = request()->query();

        // return $query;

        $attr_values = [];

        foreach($query as $key=>$row){
            if(str_starts_with($key, 'attribute')){
                array_push($attr_values,$row);
            }
        } 

        $cats = Category::with(['childrenRecursive'])
        ->where('parent_id',0)
        ->get();


        $sort = $request['sortby']!=null ? $request['sortby'] : 'newest';
        $paginate = $request['show'] !=null ? $request['show'] : 16;

        switch($sort){
            case 'price-low-to-high':
                $sortBy = '(price - discount) asc';
                break;
            case 'price-high-to-low':
                $sortBy = '(price - discount) desc';
                break;
            case 'newest':    
            default:    
                $sortBy = 'id desc';
                break;
        }


        $category = Category::with(['childrenRecursive','attributeGroups.attributeValues'])->where('slug', $slug)->first();
        $ids = $category->getCategoriesIds($category);

        $products = Product::with('photos')
        ->whereHas('attributeValues',function($q) use($attr_values){
            if($attr_values){
                $q->whereIn('attributevalue_id',$attr_values);
            }
        })
        ->whereIn('category_id',$ids)
        ->orderByRaw($sortBy)
        ->paginate($paginate);

        return view('frontend.category',[
            'cats'=>$cats ,
            'products'=>$products,
            'current_cat'=>$category,
            'sortby' => $sort,
                'query' =>$query
        ]); 
    }


    public function category_filter(Request $request){

        $query = $request->getQueryString();
        
        return $query;
        return response()->json([
            'attrs' => $request['attrs'] 
        ],200);
    }


    public function getSubcategoriesIds($category) {
        $array = [$category->id];
        if(count($category->subcategories) == 0) {
            return $array;
        } 
        else  {
            foreach ($category->childrenRecursive as $subcategory) {
                array_push($array, $subcategory->id);
                if(count($subcategory->childrenRecursive)){
                    $array = array_merge($array, $this->getChildren($subcategory->subcategories, $array));
                }
            }
            return $array;
        }
    }


    public function brand_show($slug){
        return $slug;
    }

}
