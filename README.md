comandos al principio 

```PHP
 php artisan serve
 npm install && npm run dev
 para pasar a produccion los estilos y los js y css  
 npm run build
 tambien tenemos composer update
 
```
instalar autenticacion laravel
```bash
composer require laravel/ui

php artisan serve

grupo de comandos 
```
ui

opciones que tenemos
    php artisan ui
```
```

instalacion de autentificacion
```
php artisan ui bootstrap --auth
npm install && npm run dev
```
instalacion de base de datos en laravel
```bash
php artisan migrate:fresh --seed
```

para mostrar las rutas que tenemos en laravel en la carpeta de router web 
```
comando rutas 

php artisan route:list
```


Crear controladores 

```bash
    php artisan make:controller ProductController
```

Comandos para migraciones 
```
    php artisan make:migration CreateProductsTable
```

Comandos para base de datos 

```
vuelve a cargar todo y borrar todo
 php artisan migrate:fresh    

 php artisan migrate:fresh --seed actualiza los sideer y la base de datos 

 //y solo para los seed se encuentra en la carpeta database  seeders
 php artisan db-seed

```

Comandos para crear modelos 
```
    php artisan make:model Product
```

comandos para crear factoris en database base de datos
```
    php artisan make:factory ProductFactory --model=Product
```




cuando hacemos un crud y vemos la manera de hacerlo  mas rapido
```PHP codigo
    rutas app/http/controller- ejemplo Producto tenemos los campos para llenar por defecto y donde tenemos eso 
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
    lo tenemos en la carpeta app/http/models/Producto
        protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];
    los campos que tengamos en filable solo llenara eso de la forma rapida 
    
```

Redireccinamiento de paginas a la ruta dicha es con 
```PHP
      public function store(){
        $product= Product::create(request()->all());
        return redirect()->back();//manda una redireccion a la pagina anterior
        return redirect()->action([ProductController::class, 'index']); //redirecciona a la ruta index
        return redirect()->route('products.index'); // redirecciona a la ruta index
    }

```

verificar sessiones de exito o error
```php
    //productController
    public function store(){
        if(request()->status =='available' && request()->stock == 0){
            //session()->put('error','El producto no puede estar disponible sin stock');
            session()->flash('error','El producto no puede estar disponible sin stock');
            //redirecciona a la pagina anterior con los datos withInput
            return redirect()->back()->withInput(request()->all());
        }
    }
    //master funcion para comprobar sessiones 
     @if(session()->has('error') )
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div>
    @endif
```


tipos de middlenware para controllar el login un ejemplo
```php
       //
        $this->middleware('auth');// todas las funciones del Controlador
        $this->middleware('auth')->except(['index','show']); //excepto a estas rutas el login
        $this->middleware('auth')->only(['create','store']);  //solo a estas rutas el login
```


Creamos un Request 
```php
php artisan make:request ProductRequest
```

crear modelo vista controlador
```php
php artisan make:model Image -a
```


para saber fechas
https://carbon.nesbot.com/docs/




