<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        // Liste des composantes permises
        $composantes = [
            'SEN', 'LSH', 'STAPS', 'DSP', 'ESIReims', 'Institut G. Chappaz', 
            'Cdc', 'Odonto', 'IUT RCC', 'Inspé', 'Médecine', 'SESG', 
            'Pharma', 'IUT Troyes', 'Siège'
        ];

        $color = [ 'blue', 'red', 'green', 'yellow', 'indigo', 'purple', 'pink', 'gray' ];

        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'degree' => $this->faker->randomElement($composantes),
            'members_count' => $this->faker->numberBetween(0, 6),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => Str::random(10),
            'color' => $this->faker->randomElement($color),
        ];
    }
}