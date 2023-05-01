<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function stocks(){
        return $this->belongsToMany(Stock::class);
    }
    
}
