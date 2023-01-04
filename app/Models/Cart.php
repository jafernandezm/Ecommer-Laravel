<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class Cart extends Model
{
    use HasFactory;

    /*protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'status',
    ];*/

    public function product(){
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');

    }
    
   
    
}
