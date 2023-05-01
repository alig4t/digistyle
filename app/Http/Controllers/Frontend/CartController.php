<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function index(){
       
        $cart = Session::has('cart') ? Session::get('cart') : [];

        // dd($cart);
        $HeaderMenuCats = Category::HeaderMenuCategories();
        $brands = Brand::HomePageBrands();


        return view('frontend.cart',compact(['cart','HeaderMenuCats','brands']));

    }

    public function showCart2(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        dd($oldCart);
    }
    
    
    public function showCart(){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $stock_ids = [];
        
        if($oldCart){
            foreach($oldCart->items as $key=>$row){
                array_push($stock_ids,$key);
            }
        }
        
        
        // return $stock_ids;

        $stocks = Stock::with('product','size','color')->whereIn('id',$stock_ids)->get();

        $cart = [
            "totalPrice" => 0,
            "totalDiscount" => 0,
            "finalPrice" => 0,
            "totalQty" => 0,
            "items" => [],
        ];
        

        foreach($stocks as $row){
            $cart["totalPrice"] += $row->product->price * $oldCart->items[$row->id]['qty'];
            $cart["totalDiscount"] += $row->product->discount * $oldCart->items[$row->id]['qty'];
            $cart["totalQty"] += $oldCart->items[$row->id]['qty'];
            $storeItem = [
                "qty" => $oldCart->items[$row->id]['qty'],
                "item" => $row
            ];
            array_push($cart["items"],$storeItem); 
        }

        $cart["finalPrice"] = $cart["totalPrice"] - $cart["totalDiscount"];
        return $cart;

        request()->session()->put('cart', $cart);


        dd(request()->session('cart'));
    }

    public function clearCart(){
        request()->session()->flush();
        return "true";
    }



    public function addToCart(Request $request, $stockid,$count)
    {

        
        $stock = Stock::with(['product'=>function($q){
            $q->pluck('id','title','price','discount');
        },'size','color'])->whereId($stockid)->first();



        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        
        $cart = new Cart($oldCart);
        
        $cart->add($stock,$count);
        

        $request->session()->put('cart', $cart);

        // dd(request()->session('cart'));

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
