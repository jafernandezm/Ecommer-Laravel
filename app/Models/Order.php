<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'customer_id',

    ];

    public function payment(){

        //tiene una orden de pago
        return $this->hasOne(Payment::class);
    }
    
    public function user(){
        //tiene un usuario
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function products(){
        //tiene muchos productos
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }


    public function getTotalAttribute(){
        //accedemos a la relacion de productos
        
        //accedemos a la relacion de productos para la suma de los totales
        return $this->products->pluck('total')->sum();
    }

    
}
