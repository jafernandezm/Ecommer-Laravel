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
        $user =\App\Models\User::factory(10)->create();

        $products =\App\Models\Product::factory(20)->create();

      
        $products =\App\Models\Cart::factory(20)->create();

        $orden =\App\Models\Order::factory(5)->create(
            [
                'customer_id' => $user->random()->id,
            ]
        );

        //como obtener el id de una Orden
        
        
        
        $products =\App\Models\Payment::factory(5)->create(
            [
            'order_id' => $orden->random()->id,
           ]
        );



        $products =\App\Models\Image::factory(10)->create(
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
        );


        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //$orden->products()->attach([ 1=> ['quantity'=>4] , 2=> ['quantity'=>3] , 3=> ['quantity'=>12]]);
        
        //$orden=$orden->fresh();
        
    }
}
