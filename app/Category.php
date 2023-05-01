<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $breads = [];
    public $subIds = [];
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributegroups()
    {
        return $this->belongsToMany(AttributeGroup::class, 'attributegroup_category', 'category_id', 'attribute_id');
    }

    public function attgps()
    {
        return $this->hasMany(AttributeGroup::class, 'attributegroup_category', 'category_id', 'attribute_id');
    }

    public function breadcrumb($category)
    {
        
        array_push($this->breads, $category);
        if ($category->parent_id != 0) {
            $this->breadcrumb($category->parent);
        }
        return array_reverse($this->breads);
    }

    public function scopeHeaderMenuCategories(){
        
        if(cache()->has('headerMenuCats')){
            $parent_cats = cache('headerMenuCats');
        }else{
            $parent_cats = $this::with(['childrenRecursive'])
            ->where('parent_id',0)
            ->get();
            cache(['headerMenuCats'=>$parent_cats], Carbon::now()->addMinutes(15));
        }
       
        return $parent_cats;
    }

    public function getSubcategoriesIds($subCat)
    {


        // dd($this->id);

        // foreach($this->childrenRecursive as $subcat){
        //     array_push($subIds , $subcat->id);
        //     foreach($subcat->childrenRecursive as $subcat2){
        //         array_push($subIds , $subcat2->id);
        //         foreach($subcat2->childrenRecursive as $subcat3){
        //              array_push($subIds , $subcat3->id);
        //             foreach($subcat3->childrenRecursive as $subcat4){
        //                 array_push($subIds , $subcat4->id);
        //             }
        //         }
        //     }
        // }

        // $subIds = [$this->id];
        array_push($this->subIds, $this->id);

        // $subcat = $this->childrenRecursive;
        if (count($subCat->childrenRecursive) > 0) {

            // foreach($subcat as $sub){
            //     array_push($subIds , $sub->id);

            $this->getSubcategoriesIds($subCat->childrenRecursive);
            // }
        } else {
        }

        dd($this->subIds);
    }


    public function getCategoriesIds($category)
    {
        if (!empty($category)) {
            $array = array($category->id);
            if (count($category->childrenRecursive) == 0) return $array;
            else return array_merge($array, $this->getChildrenIds($category->childrenRecursive));
        } else return null;
    }

    public function getChildrenIds($subcategories)
    {
        $array = array();
        foreach ($subcategories as $subcategory) {
            array_push($array, $subcategory->id);
            if (count($subcategory->childrenRecursive))
                $array = array_merge($array, $this->getChildrenIds($subcategory->childrenRecursive));
        }
        return $array;
    }
}
