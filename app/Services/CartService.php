<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName = 'cart';
    //obtener el carrito de la cookie
    public function getFromCookie(){
        $cartId = Cookie::get($this->cookieName);
        $card=Cart::find($cartId);
        return $card;
    }

    //obtener el carrito de la cookie o crear uno nuevo
    public function getFromCookieOrCreate()
    {
        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }
    //crear la cookie
    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    //contador de productos
    //obtener el carrito de la cookie
    public function countProducts()
    {
        $cart=$this->getFromCookie();
        if($cart != null){
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }

}
