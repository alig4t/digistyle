<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

    public function AttributeValues(){
        return $this->belongsToMany(AttributeValue::class,'attributevalue_product','product_id','attributevalue_id');
    }

    public function photos(){
        return $this->belongsToMany(Photo::class,'photo_product','product_id','photo_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
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
        // dd($extra);
        if($extra == null || $extra == ''){
            $extra = [];
        }

       return unserialize($extra);
        
    }



}
