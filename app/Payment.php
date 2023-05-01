<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    public function scopeSpanningPayment($query , $month , $success){

        $query->selectRaw('monthname(created_at) as month , count(*) as published')
        ->whereStatus($success)
        ->where('created_at' , '>' , Carbon::now()->subMonths($month))
        ->groupBy('month')
        ->latest();

    }


    public function scopeCreateCode($query){
         dd($this->where('id',1)->first());
    }
    
    

}
