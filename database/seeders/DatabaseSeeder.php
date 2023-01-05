<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Image;
use App\Models\Order;

use rand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $users =User::factory(20)
        ->create()
        ->each(function($user){
            $imagen=Image::factory()
            ->user()
            ->make();
            
            $user->image()->save($imagen);
        });
        
        //como obtener el id de una Orden
        $orders =Order::factory(20)
        ->make()
        ->each(function($orden) use ($users){
            $orden->customer_id = $users->random()->id;
            $orden->save();
            
            $paymant= Payment::factory()->make();
            
            $orden->payment()->save($paymant);
        });
        
        $carts =Cart::factory(20)->create();
        
        $products =Product::factory(50)
        ->create()
        ->each(function($product) use ($orders,$carts){
            $orders=$orders->random();
            $orders->products()->attach(
                $product->id, ['quantity'=> mt_rand(1,3)]
            );

            $carts=$carts->random();
            $carts->products()->attach(
                $product->id, ['quantity'=> mt_rand(1,3)]
            );

            $imagen=Image::factory(mt_rand(2,4))->make();

            $product->images()->saveMany($imagen);

        });
        

        

       
        
        
        
        /*$payment =\App\Models\Payment::factory(5)->create(
            [
            'order_id' => $orders->random()->id,
           ]
        );



        $imagen =\App\Models\Image::factory(10)->create(
            [
                'imageable_id' => $products->random()->id,
                'imageable_type' => Product::class,
            ]
        );
        
        $products =\App\Models\Image::factory(10)->create(
            [
                'imageable_id' => $products->random()->id,
                'imageable_type' => User::class,
            ]
        );*/

    }
}
