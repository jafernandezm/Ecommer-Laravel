<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    //

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
    public function store(){
        //forma anterior
        /*$product=Product::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock'),
            'status' => request('status'),
        ]);*/
        //forma rapida
        $product= Product::create(request()->all());


        //dd('estamos aqui en el store');
        //return view('products.store');
        return $product;
    }

    public function show($product){
        //obtener el producto el unico que coincida con el id
        $product=Product::findOrfail($product);
        #$product=DB::table('products')->find($product);
        //$product=DB::table('products')->where('id',$product)->first();


        //dd($product);

        return view('products.show')->with([
            'product'=>$product
        ]);
    }

    public function edit($product){



        return view('products.edit')->with([
            'product' => Product::findOrfail($product),//vista 404 no se encontro la vista
        ]);
    }
    public function update($product){

        $product=Product::findOrfail($product);
        //actualiza toda la tabla con los datos que se le pasan
        $product->update(request()->all());

        //return view('products.');
    }

    public function destroy($product){
        //el producto existe
        $product=Product::findOrfail($product);
        $product->delete();

        //return view('products.destroy');
        return $product;
    }


    

}
