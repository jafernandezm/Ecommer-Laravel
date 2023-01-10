<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

use App\Services\CartService;

use Illuminate\Http\Request;

use Termwind\Components\Dd;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
        //control de seguridad
        $this->middleware('auth');
    }

    public function create()
    {
        $cart=$this->cartService->getFromCookie();

        if(!isset($cart)  && $cart->products->isEmpty()){
            return redirect()
            ->back()
            ->withErrors('No hay productos en el carrito');
        }

        return view('orders.create',[
            'cart'=>$cart
        ]);

    }


    public function store(Request $request)
    {
        $user=$request->user();

        $order= $user->orders()->create([
            'status'=>'pending'
        ]);

        $cart=$this->cartService->getFromCookie();

        $cartProductsWitgQuantity=$cart
            ->products
            ->mapWithKeys(function($product){
            return [$product->id => ['quantity' => $product->pivot->quantity]];
        });
        //dd($cartProductsWitgQuantity);
        $order->products()->attach($cartProductsWitgQuantity->toArray());


    }


  


  


   


  
}
