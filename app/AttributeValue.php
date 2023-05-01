<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attributevalues';

    public function attr_groups(){
        return $this->belongsTo(AttributeGroup::class,'attr-groups-id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'attributevalue_product','attributevalue_id','product_id')->withPivot('attributevalue_id');
    }


}
