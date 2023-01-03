@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Create a product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-row">
                <label >Titulo {{-- title --}}</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-row">
                <label >Descripcion {{-- description --}}</label>
                <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
            </div>
    
            <div class="form-row">
                <label >Precio {{-- prece --}}</label>
                <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') }}" required>
            </div>
            <div class="form-row">
                <label>Cantidad {{-- Stock --}}</label>
                <input class="form-control" type="number" name="stock" value="{{ old('stock') }}" required>
            </div>
            <div class="form-row">
                <label >Estado {{-- status --}}</label>
                <select class="custom-select" name="status" id="status" required>
                    <option value="" selected>Select ....</option>
                    <option {{old('status')  == 'available' ? 'selected' : '' }} value="available"  >Disponible</option>
                    <option {{old('status')  == 'unavailable' ? 'selected' : ''}} value="unavailable" >No disponible</option>
                </select>
            </div>
            <div class="form-row mt-3">
                <button type="submit" class="btn btn-primary btn-lg">Crear {{-- Create --}}</button>
            </div>
        </form>
    </div>
   

@endsection