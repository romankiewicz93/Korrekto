<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'name' =>$this->faker->unique()->randomElement([
                'name' =>$this->faker->randomElement([
                // 'bezeichnung' =>$this->faker->randomElement([
                "Skript",
                "Forum",
            "Vodcast",
            "Podcast",
            "VIDEO-Lecture",
            "Lösungsheft",
            "myCampus‐Fragen",
            "Tutorium",
            "Präsentation",
            "Literaturangabe"]),

            'description' =>  $this->faker->text(100),
        ];
    }
}
