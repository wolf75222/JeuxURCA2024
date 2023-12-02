<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Degree;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Degree>
 */
class DegreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Degree::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Generates a unique word as the degree name
        ];
    }
}
