<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children(){
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function childrenRecursive(){
        return $this->children()->with('childrenRecursive');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

}
