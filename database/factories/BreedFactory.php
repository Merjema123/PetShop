<?php

namespace Database\Factories;
use App\Models\Breed;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Breed::class;
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->randomElement(['Husky','Šarplaninac','Samojed','Kangal','Pitbull']),
            'country'=>$this->faker->randomElement(['DE','BIH','ENG']),
            'category'=>$this->faker->numberBetween(1,3),
        ];
    }
}
