<?php

namespace Database\Factories;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categories_id' => Categories::all()->random(1)->first(),
            'brands_id' => Brands::factory(),
            'name' => Str::random(20),
            'price' => $this->faker->randomFloat(),
            'weight' => rand(0,999999999),
            'structure' => json_encode($this->structure()),
        ];
    }

    public function structure(): array
    {
        $r = rand(3, 20);
        $arr = [];
        for ($i = 0; $i < $r; $i++) {
            $arr[Str::random(5)] = Str::random(5);
        }
        return $arr;
    }
}
