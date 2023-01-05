@extends('layouts.app')

@section('content')
    <h1>Lista de carritos</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            <p>El Carrito esta vacio</p>
        </div>    
    
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection