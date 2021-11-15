<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => $this->faker->numberBetween(1, 14),
            'gear_type_id' => $this->faker->numberBetween(1, 3),
            'fuel_type_id' => $this->faker->numberBetween(1, 4),
            'class_group_id' => $this->faker->numberBetween(1, 7),
            'price' => $this->faker->numberBetween(1500, 6000),
            'deposit' => $this->faker->numberBetween(300, 1000),
            'vote' => $this->faker->numberBetween(1, 10),
            'kilometer' => $this->faker->numberBetween(1, 500000),
            'driver_licence_age' => $this->faker->numberBetween(16, 26),
        ];
    }
}
