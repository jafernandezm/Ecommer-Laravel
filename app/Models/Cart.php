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

    public function products(){
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');

    }
    
     //retornamso el total de la compra
     public function getTotalAttribute(){
        //accedemos a la relacion de productos
        
        //accedemos a la relacion de productos para la suma de los totales
        return $this->products->pluck('total')->sum();
    }
    
}
