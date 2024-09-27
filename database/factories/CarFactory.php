<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'car_type' => $this->faker->randomElement(['SUV', 'Sedan', 'Hatchback']),
            'daily_rent_price' => $this->faker->randomFloat(2, 50, 500),
            'availability' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(640, 480, 'cars', true),
        ];
    }
}
