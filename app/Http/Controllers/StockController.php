<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function stock_add($id){
        $product = Product::with('stocks.color','stocks.size')
        ->whereId($id)->first();

        $totalCount = Stock::where('product_id',$id)
        ->sum('count');

        return view('backend.products.addstock',compact(['product','totalCount']));
    }
    public function stock_store(Request $request){

        // return $request->all();
        $stock = new Stock();
        $stock->product_id = $request->input('product_id');
        $stock->color_id = $request->input('color_id');
        $stock->size_id = $request->input('size_id');
        $stock->count = $request->input('count');
        $stock->save();

        Session::flash('add_stock', 'موجودی جدید ثبت شد');
        return redirect(route('stock.add',$request->input('product_id')));
        // return view('backend.products.addstock',compact(['product']));
    }

    public function stock_update(Request $request,$stock){

        // return $stock;
        // return $request->all();
        $stock = Stock::findorfail($stock);
        $stock->count = $request->input('count');
        $stock->save();

        Session::flash('update_stock', 'موجودی جدید ثبت شد');
        return back();
        // return view('backend.products.addstock',compact(['product']));
    }


}
