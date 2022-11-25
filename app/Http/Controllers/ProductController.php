<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    public function __construct()
    {
        //
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
    public function store(){
        $rules=[
            'title'=> ['required','max:255'],
            'description'=> ['required','max:1000'],
            'price'=> ['required','min:1'],
            'stock'=> ['required','min:0'],
            'status'=> ['required','in:available,unavailable'],
        ];
        
        request()->validate($rules);

        //sesiones para guardar los datos available->'diponiobles' y  unavailable:'no disponibles'
        if(request()->status =='available' && request()->stock == 0){
            //session()->put('error','El producto no puede estar disponible sin stock');
            //redirecciona a la pagina anterior con los datos withInput
            return redirect()
            ->back()
            ->withInput(request()->all())
            ->withErrors('El stock debe ser mayor a 0 si el producto esta disponible');
        }

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
        $product= Product::create(request()->all());
        #session()->flash('success','El producto se creo con exito');
        //formas de redireccionar
        //return redirect('/products');
        //return redirect()->back();//manda una redireccion a la pagina anterior
        //return redirect()->action([ProductController::class, 'index']); //redirecciona a la ruta index
        return redirect()
        ->route('products.index')
        ->withSuccess('El producto se creo con exito'); // redirecciona a la ruta index
        //->wiht('success','El producto se creo con exito'); // redirecciona a la ruta index
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
        $rules=[
            'title'=> ['required','max:255'],
            'description'=> ['required','max:1000'],
            'price'=> ['required','min:1'],
            'stock'=> ['required','min:0'],
            'status'=> ['required','in:available,unavailable'],
        ];
        
        request()->validate($rules);
        
        $product=Product::findOrfail($product);
        //actualiza toda la tabla con los datos que se le pasan
        $product->update(request()->all());

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
