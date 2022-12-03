<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
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
        // $products = Product::with(['category'=>function($cat){
        //     $cat->with(['attributegroups'=>function($attr_gp){
        //         $attr_gp->with('attributeValues');
        //         // ->where('products.id','product_id');
        //     }]);
        // }])->orderby('id','desc')->get();



        $products = Product::with(['category', 'photos', 'AttributeValues' => function ($q) {
            $q->with('attr_groups');
        }])
            ->orderBy('id', 'desc')->paginate(10);




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

        return $request->input('extra');
      

        $newProduct = new Product();

        $newProduct->sku = $newProduct->generateSku();

        $newProduct->title = $request->input('title');
        $newProduct->slug = $request->input('slug');
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
            if ($row['title'] != null && $row['title']!='') {
                return true;
            }
        });
        $extra_array = array_values($extra_array);


        // return $extra_array;

        $product = Product::findorfail($id);

        $product->title = $request->input('title');
        $product->slug = $request->input('slug');
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
