<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3), // Génère un nom de tournoi (3 mots)
            'description' => fake()->paragraph(2), // Génère une description plus longue
            'nbr_equipes' => fake()->numberBetween(4, 32), // Nombre d'équipes entre 4 et 32
            // Vous pouvez ajouter d'autres champs selon votre modèle Tournament
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeThisMonth(),
        ];
    }
}
