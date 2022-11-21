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
        return view('products.store');
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
        return view('products.edit');
    }
    public function update($product){
        return view('products.update');
    }

    public function destroy($product){
        return view('products.destroy');
    }


    

}
