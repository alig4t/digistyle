<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Integer;

class ProductController extends Controller
{



    public function show($slug)
    {
        $product = Product::with(['photos', 'attributeValues', 'category.attributeGroups', 'brand' , 'stocks'=>function($q){
            $q->orderBy('color_id');
        }])
        ->where('slug', $slug)
        ->first();

        // dd($product->toSql());

        // dd(Session('cart')->items[2]['item']['product']);

        // foreach(Session::get('cart')->items as $key=>$row){
        //     // dd($row['item']->product->photos[0]->path);
        // }


        $category = Category::
            where('id', $product->category_id)
            ->first();


        $related = Product::with('photos')->where('category_id', $category->id)->limit(8)->get();

        $breadcrumbCats = $category->breadcrumb($category);

        

        $array_gp = [];
        foreach ($product->AttributeValues as $att_val) {
            $gp = $att_val->attr_groups->title;
            $val = $att_val->title;
            if (array_key_exists($gp, $array_gp)) {
                array_push($array_gp[$gp], $val);
            } else {
                $array_gp[$gp] = [$val];
            }
        }

        

        return view('frontend.showproduct', compact([
            'product',
            'category',
            'breadcrumbCats',
            'array_gp',
            'related',
        ]));
    }




    public function category_show(Request $request, $slug)
    {

        $params = $this->manage_params($request->query());
        
        
        $sortBy = $this->manage_sortby($params['sortby']);    

        $category = Category::with(['childrenRecursive', 'attributeGroups.attributeValues'])->where('slug', $slug)->first();
        $ids = $category->getCategoriesIds($category);


        // return $ids;

        $products = Product::with('photos','attributeValues')

            ->MultiFilterAttr($params['attributes_checked'])
            ->whereIn('category_id', $ids)
            ->orderByRaw($sortBy)
            
            ->paginate($params['show']);

            // ->count();

            // return $products;

        return view('frontend.category', [
            'params' => $params,
            'products' => $products,
            'current_cat' => $category,     
        ]);
    }




    // public function category_filter(Request $request)
    // {

    //     $query = $request->getQueryString();

    //     return $query;
    //     return response()->json([
    //         'attrs' => $request['attrs']
    //     ], 200);
    // }


    public function getSubcategoriesIds($category)
    {
        $array = [$category->id];
        if (count($category->subcategories) == 0) {
            return $array;
        } else {
            foreach ($category->childrenRecursive as $subcategory) {
                array_push($array, $subcategory->id);
                if (count($subcategory->childrenRecursive)) {
                    $array = array_merge($array, $this->getChildren($subcategory->subcategories, $array));
                }
            }
            return $array;
        }
    }


    public function brand_show($slug)
    {
        return $slug;
    }





    
    public function manage_params($queries){
        
        $params = [
            "attributes_array"=>[],
            "attributes_checked"=>[],
            "page"=> 1,
            "show"=> 16,
            "sortby"=> "newest",
            "q" => ''
        ];
        foreach ($queries as $key=>$row) {
            if($key == 'page'){
                $params['page'] = intval($row);
                continue;
            }
            if($key == 'show'){
                $params['show'] = intval($row);
                continue;
            }
            if($key == 'sortby'){
                $params['sortby'] = $row;
                continue;
            }
            if($key == 'q'){
                $params['q'] = $row;
                continue;
            }
            if (str_contains($row, ',')) {
                $sub = explode(',', $row);
                $params['attributes_array'][$key] = $row;
                foreach($sub as $p){
                     array_push($params['attributes_checked'] , intval($p));
                }
            } else {
                $params['attributes_array'][$key] = intval($row);
                array_push($params['attributes_checked'] , intval($row));
            }
        }
        return $params;
    }

    public function manage_sortby($sort){
        
        switch ($sort ) {
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
        return $sortBy;
    }


    public function search_product(){
        
        
        $keyword = request('q');
        $params = $this->manage_params(request()->query());       
        $sortBy = $this->manage_sortby($params['sortby']);    


        $products = Product::where('title','like','%'.$keyword.'%')
        ->orderByRaw($sortBy)
        ->paginate($params['show']);



        return view('frontend.search', [
  
            'params' => $params,
            'products' => $products,
        
          
        ]);

    }


}
