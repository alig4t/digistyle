<?php

namespace App;

class Cart
{
    public $items = null;
    public $stock_ids = [];
    public $totalPrice = 0;
    public $totalDiscount = 0;
    public $finalPrice = 0;
    public $totalQty = 0;

    public $cart = [
        "totalPrice" => 0,
        "totalDiscount" => 0,
        "finalPrice" => 0,
        "totalQty" => 0,
        "items" => [],
    ];


    public function __construct($oldCart)
    {
        
        if($oldCart){
            $this->items = $oldCart->items;
            foreach($oldCart->items as $key=>$row){
                array_push($this->stock_ids,$key);
            }
        }

    }


    public function add($stock, $count)
    { 
        
        $storedItem = [
            'qty' => 0,  
            'item' => $stock,
        ];

        if ($this->items) {
            if (array_key_exists($stock->id, $this->items)) {
                $storedItem = $this->items[$stock->id];
            }
        }
        $storedItem['qty'] += $count;
        $this->items[$stock->id] = $storedItem;
        array_push($this->stock_ids,$stock->id);
        return $this->save_cart();
    }



    public function save_cart(){

        $stocks = Stock::with(['product'=>function($q){
            $q->with('photos');
        },'size','color'])->whereIn('id',$this->stock_ids)->get();
        foreach($stocks as $row){
            $this->totalPrice += $row->product->price * $this->items[$row->id]['qty'];
            $this->totalDiscount += $row->product->discount * $this->items[$row->id]['qty'];
            $this->totalQty += $this->items[$row->id]['qty'];
            $storeItem = [
                "qty" => $this->items[$row->id]['qty'],
                "item" => $row
            ];
            array_push($this->cart["items"],$storeItem); 
        }
        $this->finalPrice = $this->totalPrice - $this->totalDiscount;

    }


    public function removeItem($pid){
        if ($this->items) {
            if (array_key_exists($pid, $this->items)) {
                $this->items[$pid]['qty'] --;
                // $this->items[$pid]['']
                if( $this->items[$pid]['qty'] == 0){
                    unset($this->items[$pid]);
                }
                $this->save_cart();
            }
        }
    }

    public function addItem($pid){
        if ($this->items) {
            if (array_key_exists($pid, $this->items)) {
                $this->items[$pid]['qty'] ++;
                $this->save_cart();
            }
        }
    }



}
