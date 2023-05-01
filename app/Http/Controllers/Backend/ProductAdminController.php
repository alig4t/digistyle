<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use App\Stock;
// use axios;
use Illuminate\Support\Facades\Session;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $products = Product::list('title')->get();

        // $products = Product::with(['category'=>function($cat){
        //     $cat->with(['attributegroups'=>function($attr_gp){
        //         $attr_gp->with(['attributeValues'=>function($q){
        //             $q->whereIn('id',$this->AttributeValues);
        //         }]);
        //     }]);
        // }])->orderby('id','desc')->get();

        // return $products;

        $products = Product::with(['category', 'photos','AttributeValues.attr_groups','stocks.color','stocks.size'])
        ->orderBy('id', 'desc')->paginate(50);

        // return $products;


        // $array_gp = [];

        // foreach($products as $product){
        //     array_push($array_gp,$product->id);
        
        
        // }


        // foreach ($products[0]->AttributeValues as $att_val) {
        //     $gp = $att_val->attr_groups->title;
        //     $val = $att_val->title;
        //     if (array_key_exists($gp , $array_gp)) {
        //         array_push($array_gp[$gp], $val);
        //     } else {
        //         $array_gp[$gp] = [$val];
        //     }
        // }

        // return $array_gp;

        // return $products;

        return view('backend.products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')
            ->where('parent_id', 0)
            ->get();
        return view('backend.products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        return $request->all();


        $newProduct = new Product();

        $newProduct->sku = $newProduct->generateSku();

        $newProduct->title = $request->input('title');
        $newProduct->slug = $request->input('slug');
        $newProduct->brand_id = $request->input('brand');

        $newProduct->description = $request->input('description');
        $newProduct->extra = serialize($request->input('extra'));

        $newProduct->category_id = $request->input('cat');
        $newProduct->price = $request->input('price');
        $newProduct->discount = $request->input('discount');
        $newProduct->status = $request->input('status');

        $newProduct->save();

        $newProduct->AttributeValues()->sync($request->input('attr'));
        $newProduct->photos()->sync($request->input('gallery'));

        Session::flash('add_product', 'محصول جدید با موفقیت ایجاد شد');
        return redirect('admin/products');
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
        $product = Product::with('photos', 'category', 'AttributeValues')
            ->whereId($id)
            ->first();

        // if($product->extra == null){
        //     $extra = [];
        // }else{
        //     $extra = unserialize($product->extra);
        // }
        // dd($product);

        // return array_values($extra);
        // return serialize([]);

        $categories = Category::with('childrenRecursive')
            ->where('parent_id', 0)
            ->get();


        return view('backend.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {

        // return serialize($request->input('extra'));
        $extra_array = array_filter($request->input('extra'), function ($row) {
            if ($row['title'] != null && $row['title'] != '') {
                return true;
            }
        });
        $extra_array = array_values($extra_array);


        // return $extra_array;

        $product = Product::findorfail($id);

        $product->title = $request->input('title');
        $product->slug = $request->input('slug');
        $product->brand_id = $request->input('brand');

        $product->description = $request->input('description');
        $product->extra = serialize($extra_array);

        $product->category_id = $request->input('cat');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->status = $request->input('status');

        $product->save();

        $product->AttributeValues()->sync($request->input('attr'));
        $product->photos()->sync($request->input('gallery'));

        Session::flash('add_product', 'محصول جدید با موفقیت ویرایش شد');
        return redirect('admin/products');
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
