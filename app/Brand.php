<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    // protected $fillable = [];
    protected $casts = [
        'logo' => 'array',
    ];


    public function scopeHomePageBrands(){

        
        if(cache()->has('homeBrands')){
            $brands = cache('homeBrands');
        }else{
            $brands = $this::latest()->limit(12)->get();
            cache(['homeBrands'=>$brands], Carbon::now()->addMinutes(1440));
        }
       
       return $brands;
    }

}
