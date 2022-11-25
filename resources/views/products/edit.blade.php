@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Editar a product</h1>

        <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <label >Titulo {{-- title --}}</label>
                <input class="form-control" type="text" name="title" required value="{{ old('title') ?? $product->title}}">
            </div>
            <div class="form-row">
                <label >Descripcion {{-- description --}}</label>
                <input class="form-control" type="text" name="description" required value="{{ old('description') ?? $product->description }}">
            </div>
    
            <div class="form-row">
                <label >Precio {{-- prece --}}</label>
                <input class="form-control" type="number" min="1.00" step="0.01" name="price" required value="{{ old('price') ?? $product->price }}">  
            </div>
            <div class="form-row">
                <label>Cantidad {{-- Stock --}}</label>
                <input class="form-control" type="text" name="stock" required value="{{ old('stock') ?? $product->stock }}" >
            </div>
            <div class="form-row">
                <label >Estado {{-- status --}}</label>
                <select class="custom-select" name="status" id="status" required>

                    <option {{ old('status') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }} value="available">
                        Disponible
                    </option>
                    <option {{ old('status') == 'unavailable' ? 'selected' :  ($product->status == 'unavailable' ? 'selected' : '')  }}value="unavailable" >
                        No disponible
                    </option>
                </select>
            </div>
            <div class="form-row mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Editar Producto {{-- Create --}}</button>
            </div>
        </form>
    </div>
   

@endsection