<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        //ddd(substr (strrchr ($this->faker->name(), " "), 1));
       // ddd(substr (1 , strrchr ($this->faker->name(), " ")));
       /*
    'first_name' => strstr($this->faker->name(), ' '),
            'last_name' =>   substr (strrchr ($this->faker->name(), " "), 1),

       */
        // Hier werden die Daten gefaket
        return [
            'title' => $this->faker->title(),
            'firstName' => $this->faker->firstName(),
            'lastName' =>  $this->faker->lastName(),
            'country' =>  $this->faker->country(),
            'city' =>  $this->faker->city(),
            'postcode' =>  $this->faker->postcode(),
            //'strasse_hausnummer' =>  $this->faker->streetName() .' '. $this->faker->buildingNumber(), //+
            'streetName' =>  $this->faker->streetName() .' '. $this->faker->biasedNumberBetween(1,20), //+
            'jobTitle' =>  $this->faker->jobTitle(),
            //'sprache' =>  $this->faker->languageCode(),
            'languageCode' =>  'deutsch',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'registered_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phoneNumber' => $this->faker->phoneNumber(),
            'department' => 'Tutor',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
