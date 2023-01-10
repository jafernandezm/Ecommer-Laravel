
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comprar Orden</h1>

        <h4 class="text-center"><strong>El total es {{$cart->total}}</strong></h4>
        <div class="text-center mb-3">
            <form class="d-inline" 
            method="POST" 
            action="{{ route('orders.store')  }}">
                @csrf
                <button type="submit" class="btn btn-success">Confirmar orden </button>
            </form>
        </div>
       

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Producto</th>
                        <th>Price</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset($product->images->first()->path)}}" alt="" width="100">
                                {{ $product->title }}
                            </td>
                            <td>{{ $product->price }}</td>{{-- nombre ->title --}}
                            <td>{{ $product->pivot->quantity }}</td>{{-- descripcion-> description--}}
                            {{-- precio --}}
                            <td>
                                {{-- {{ $product->price * $product->pivot->quantity }} --}}
                                $ {{ $product->total}}
                            </td>
                        </tr>

                    @endforeach
                    
                </tbody>

            </table>
        </div>
    </div>
@endsection