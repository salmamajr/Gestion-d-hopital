<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'prenom' => $this->faker->firstName,
            'nom' => $this->faker->lastName,
            'dateNaissance' => $this->faker->date('Y-m-d', '2000-01-01'),
            'genre' => $this->faker->randomElement(['Masculin', 'Feminin']),
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'numero_securite_sociale' => $this->faker->unique()->numerify('##########'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
