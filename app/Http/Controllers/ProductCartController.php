<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductCartController extends Controller
{
   
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(Request $request, Product $product)
    {
        
        $cart =$this->cartService->getFromCookieOrCreate();
        //Cart::create();


        $quantity=$cart->products()
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;
        //simco el producto ya existe en el carrito
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity+1]
        ]);
        // 1 - obtener el carrito de la cookie
        //$cookie=Cookie::make('cart', $cart->id, 7 * 24 *60);

        $cookie=$this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        $cart->products()->detach($product->id);

        $cookie=$this->cartService->makeCookie($cart);

        return redirect()->back();
    }
    
   

}
