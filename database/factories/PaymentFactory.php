<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //pagos de 15 a 500 euros
            'amount'=>$this->faker->randomFloat(2, 15 , 500),
          
            //tiempo de pago entre 1 año y ahora
            'payed_at'=>$this->faker->dateTimeBetween('-1 year','now', null ),
            //'order_id'=>$this->faker->numberBetween(1,100),
        ];
    }
}
