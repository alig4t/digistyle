<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function product(){
        return $this->belongsToMany(Product::class,'photo_product','photo_id','product_id');

    }
}
