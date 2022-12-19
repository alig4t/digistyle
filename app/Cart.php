<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $finalPrice = 0;
    public $totalDiscount = 0;

    public function __construct($oldcart)
    {
        if ($oldcart) {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
            $this->finalPrice = $oldcart->finalPrice;
            $this->totalDiscount = $oldcart->totalDiscount;
        }
    }

    public function add($item, $pid)
    { 
        $storedItem = [
            'qty' => 0,
            'price' => $item->price ,
            'discount' => $item->discount,
            'item' => $item
        ];
        if ($this->items) {
            if (array_key_exists($pid, $this->items)) {
                $storedItem = $this->items[$pid];
            }
        }
        $storedItem['qty'] += 1;
        $storedItem['price'] = $item->price;
        $storedItem['discount'] = $item->discount;
        $this->items[$pid] = $storedItem;
        // $this->totalQty +=1;
        // $this->totalPrice += $storedItem['price'];
        // $this->totalDiscount += $storedItem['discount'];
        // $this->finalPrice += ($storedItem['price'] - $storedItem['discount']) * $storedItem['qty'];
        $this->save_cart();
    }

    public function save_cart(){
        $this->totalPrice = 0;
        $this->totalDiscount = 0;
        $this->totalQty = 0;
        $this->finalPrice = 0;
        foreach($this->items as $item){
            $this->totalPrice += $item['item']->price * $item['qty'];
            $this->totalDiscount += $item['item']->discount * $item['qty'];
            $this->totalQty += $item['qty'];
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
