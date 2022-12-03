<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributegroups';


    public function categories(){
        return $this->belongsToMany(Category::class,'attributegroup_category','attribute_id','category_id');
    }
    public function attributeValues(){
        return $this->hasMany(AttributeValue::class,'attr-groups-id');
    }

}





