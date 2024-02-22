<?php

namespace Database\Factories;
use App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     *
     * @return array<string, mixed>
     * 
     */
    protected $model=Pet::class;
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->randomElement(['Miki','Ljupko','Roki','Max','Dedo','Bebica','Kiki','Riki','Gari','Zeko','Peko','Medo','Gigi','Klaud']),
            'year'=>$this->faker->dateTimeBetween($startDate='-3 years', $endDate='now', $timezone=null),
            'breed'=>$this->faker->numberBetween(1,5),
            'price'=>$this->faker->numberBetween(200,1499),
        ];
    }
}
