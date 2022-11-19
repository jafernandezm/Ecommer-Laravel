<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    //

    public function index(){

        $products=DB::table('products')->get();
        //dd($products);


        return view('products.index');
    }

    public function create(){
        return view('products.create');
    }
    public function store(){
        return view('products.store');
    }

    public function show($product){

        $product=DB::table('products')->where('id',$product)->get();

        dd($product);

        return view('products.show' , ['product' => $product]);
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
