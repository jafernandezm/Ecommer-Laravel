<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MainController extends Controller
{
    //
    public function index(){
        //nombre de la aplicacion
        $name= config('app.name');
        //dump($name);
        //dd($name);

        
        return view('welcome');
    }
}
