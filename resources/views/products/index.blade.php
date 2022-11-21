
@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Lista de productos</h1>
        
        @if (empty($products))
            <div class="alert alert-warning">
                No hay prodcutos
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>descipcion</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>{{-- nombre ->title --}}
                            <td>{{ $product->description }}</td>{{-- descripcion-> description--}}
                            <td>{{ $product->price }} BS</td>{{-- precio ->price--}}
                            <th>{{ $product->stock}}</th>{{-- cantidad-> stock--}}
                            
                            <td>
                            {{--  <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>

            </table>
        </div>
    </div>
@endif

@endsection


