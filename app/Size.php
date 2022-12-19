<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
   protected $fillable = [
    'size','description'
];

public function stocks(){
    return $this->belongsToMany(Stock::class);
}

}
