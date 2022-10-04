<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModuleMaterialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bezeichnung' =>$this->faker->unique()->randomElement([
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

            'beschreibung' =>  $this->faker->text(100),
        ];
    }

    /*
    public function getBeschreibung()
    {
        $index = rand(0, 11);
        $beschreibungen = array(


        );

        return $beschreibungen[$index];
    }*/
}
