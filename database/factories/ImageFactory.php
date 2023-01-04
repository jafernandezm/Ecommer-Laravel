<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $filaName=$this->faker->numberBetween(1,10) . '.jpg';
        return [
            //las imagenes son de 640x480 y de gatos

            'path'=>"img/products/$filaName"

            

        ];
    }

    public function user(){
        $filaName=$this->faker->numberBetween(1,5) . '.jpg';
        return $this->state([
            'path'=>"img/users/$filaName"
        ]);
    }
}
