<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

//request
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        //verifica la autentificacion de login 
        $this->middleware('auth');
        //$this->middleware('auth')->except(['index','show']); //excepto a estas rutas el login
        //$this->middleware('auth')->only(['create','store']);  //solo a estas rutas el login
    }
    
    public function index(){
        //genera todos los productos
        $products=Product::all();

        #$products=DB::table('products')->get();
        //dd($products);


        return view('products.index')->with([
            'products' => $products
        ]);
    }

    public function create(){

        return view('products.create');

    }
    public function store(ProductRequest $request){
        $product= Product::create($request->validated());
        return redirect()
        ->route('products.index')
        ->withSuccess('El producto se creo con exito'); // redirecciona a la ruta index

    
        
        //->wiht('success','El producto se creo con exito'); // redirecciona a la ruta index
         //session()->forget('error');
        //forma anterior
        /*$product=Product::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock'),
            'status' => request('status'),
        ]);*/
        //forma rapida
    }


    public function show($product){
        //obtener el producto el unico que coincida con el id
        //$product=Product::findOrfail($product);
        #$product=DB::table('products')->find($product);
        //$product=DB::table('products')->where('id',$product)->first();
        //dd($product);


        $product=Product::findOrfail($product);

        return view('products.show')->with([
            'product'=>$product
        ]);
    }

    public function edit( $product){
        
        $product=Product::findOrfail($product);
        
        return view('products.edit')->with([
            'product' =>  $product,//vista 404 no se encontro la vista
        ]);
    }

    public function update(ProductRequest $request,$product){
       
        $product=Product::findOrfail($product);

        //actualiza toda la tabla con los datos que se le pasan
        $product->update($request->validated());


        return redirect()
        ->route('products.index')
        ->withSuccess('El producto se actualizo correctamente');
    }

    public function destroy($product){
        //el producto existe
        $product=Product::findOrfail($product);
        $product->delete();

        //return view('products.destroy');
        return redirect()
        ->route('products.index')
        ->withSuccess('El producto fue eliminado correctamente');
    }


    

}
