<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders()
    {
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }
    //muchos
    public function carts()
    {
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }
    //relacion polimorfica
    public function images()
    {
        return $this->morphMany( Image::class , 'imageable');
    }
    //retornamos productos disponbibles
    public function scopeAvailable(){
        return $this->where('status', 'available');
    }
    //retornamso el total de la compra
    public function getTotalAttribute(){
        return $this->price * $this->pivot->quantity;
    }

}
