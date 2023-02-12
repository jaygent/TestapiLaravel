<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaterialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'products_id'=>Products::all()->random(1)->first(),
            'color'=>$this->faker->hexColor(),
            'size'=>Str::random(20)
        ];
    }
}
