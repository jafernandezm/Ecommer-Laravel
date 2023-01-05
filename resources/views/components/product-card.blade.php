
<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="500">
    <div class="card-body">
        <h5 class="text-rigth"> <strong>${{ $product->price}}</strong></h5>{{-- precio ->price--}}
        <h4 class="card-title"> {{ $product->title}}</h4>                   {{-- nombre ->title --}}
        <h4 class="card-text"> {{ $product->descripcion }}</h4>             {{-- descripcion-> description--}}
        <h4 class="card-text"> <strong> {{ $product->stock }} </strong></h4>{{-- cantidad-> stock--}}
        @if(isset($cart))
            <form class="d-inline" 
            method="POST" 
            action="{{ route('products.carts.destroy', ['cart'=>$cart->id ,'product'=> $product->id ] ) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Eliminar </button>
            </form>
        @else

        <form class="d-inline" 
        method="POST" 
        action="{{ route('products.carts.store', ['product'=> $product->id ] ) }}">
            @csrf
            <button type="submit" class="btn btn-success">Anadir </button>
        </form>
        @endif
    
     

    </div>
</div>



{{-- 
    <h1> {{ $product->title }} ({{ $product->id }})  </h1> 
<p>{{ $product->title }}</p>
<p> {{ $product->description }} </p>
<p>  {{ $product->price }} BS </p>
<p>  {{ $product->stock}} </p>
<p>  {{ $product->status}} </p>  
    
--}}
 
    


