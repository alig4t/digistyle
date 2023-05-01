<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function scopeMultiFilterAttr($query,$attr){
        for($i=0 ; $i<count($attr) ; $i++){
            $query->FilterAttr($attr[$i]);
        }
    }

    public function scopeFilterAttr($query,$filter){
        $query->whereHas('attributeValues', function ($q) use ($filter) {
            $q->where('attributevalue_id' , $filter);
        });
    }


    public function scopeProductCategoryAll(){
         
        $category_ids = [6,21,22];
        if(cache()->has('ProductCatHome')){
            $category_product = cache('ProductCatHome');
        }else{
            foreach($category_ids as $key=>$cid){
                $category_product[$key] = $this->ProductCategory($cid);
            }
            cache(['ProductCatHome' => $category_product] , Carbon::now()->addMinutes(60));
        }
        return $category_product;
    }

    public function ProductCategory($cid){
            return Product::with('photos')
            ->where('category_id',$cid)
            ->latest()
            ->take(5)
            ->get();
    }



    public function AttributeValues(){
        return $this->belongsToMany(AttributeValue::class,'attributevalue_product','product_id','attributevalue_id');
    }

    public function photos(){
        return $this->belongsToMany(Photo::class,'photo_product','product_id','photo_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function validSku($sku){
        return $this->where('sku',$sku)->exists();
    }

    public function generateSku(){
        $bool = true;
        while($bool){
            $sku =  mt_rand(11111,99999);
            if($this->validSku($sku) == false){
                $bool = false;
            }
        }
        return (string)$sku;
    }


    public function getExtraAttribute($extra){
        // dd(serialize([]));
        if($extra == null || $extra == ''){
            $extra = "a:0:{}";
        }

       return unserialize($extra);
        
    }

    public function getDiscountAttribute($discount){
        if($discount == null || $discount == ''){
            $discount = 0;
        }
        return $discount;
    }

    public function path(){
        return "/" . "product/".$this->slug;
    }

}
