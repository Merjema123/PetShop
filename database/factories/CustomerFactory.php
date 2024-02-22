<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model=Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Sara', 'Klara', 'Amela', 'Ema', 'Una', 'Esma', 'Dina', 'Dzeri', 'Adna', 'Aida', 'Uma']),
            'lastname' => $this->faker->randomElement(['Poric', 'Abazovic', 'Cinac', 'Kapic', 'Pljakic', 'Grgic', 'Bobic', 'Sijamhodzic']),
            'email' => $this->faker->email(),
            'phonenumber' => $this->faker->unique()->randomDigit,
            'radnik' => $this->faker->numberBetween(1, 5),
            
        ];
    }
}
