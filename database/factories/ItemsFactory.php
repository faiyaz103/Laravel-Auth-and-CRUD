<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Items;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Items::class;
    public function definition(): array
    {
        return [
            //
            'name' => fake()->streetName(),
            'price' => fake()->randomFloat(2,10,500),
        ];
    }
}
