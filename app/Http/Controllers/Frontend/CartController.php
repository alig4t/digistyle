<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function index(){
        $cats = Category::with(['childrenRecursive'])
        ->where('parent_id',0)
        ->get();

        $cart = Session::has('cart') ? Session::get('cart') : [];

        // dd($cart);

        return view('frontend.cart',compact(['cart','cats']));

    }


    public function addToCart(Request $request, $pid)
    {

        $product = Product::with('photos')->whereId($pid)->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        // return 'ssssssss';

        // dd(session()->get('cart'));

        return response()->json([
            'quantity' => session('cart')->totalQty,
            'totalPrice' => session('cart')->totalPrice,
            'totalDiscount' =>  session('cart')->totalDiscount,
            'finalPrice' => session('cart')->totalPrice - session('cart')->totalDiscount,
            'items' => array_values(session('cart')->items),
        ], 200);
    }


    public function removeCart($pid){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if($oldCart){
            $cart = new Cart($oldCart);
            $cart->removeItem($pid);
            // dd($cart);
            session()->put('cart', $cart);
        }
        return back();
    }


    public function plusCart($pid){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if($oldCart){
            $cart = new Cart($oldCart);
            $cart->addItem($pid);
            // dd($cart);
            session()->put('cart', $cart);
        }
        return back();
    }


}
