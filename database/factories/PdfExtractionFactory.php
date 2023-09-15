<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PdfExtraction; // Assurez-vous d'importer correctement la classe PdfExtraction

class PdfExtractionFactory extends Factory
{
    protected $model = PdfExtraction::class; // Spécifiez la classe du modèle associé

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'titre' => $this->faker->sentence,
            'text' => null
            // 'text' => $this->faker->paragraph // Utilisez $this->faker->paragraph pour générer du texte aléatoire
            // Vous pouvez ajouter d'autres attributs et leurs valeurs par défaut ici
        ];
    }
}
