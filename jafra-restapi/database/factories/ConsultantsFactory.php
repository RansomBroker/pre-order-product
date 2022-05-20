<?php

namespace Database\Factories;

use App\Models\Consultants;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ConsultantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Consultants::class;

    public function definition()
    {
        return [
            'consultant_unique_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'consultant_name' => $this->faker->name(),
            'consultant_username' => $this->faker->userName(),
            'consultant_email' => $this->faker->email(),
            'password' => bcrypt('12345678'),
            'ticket_type'=> $this->faker->numberBetween(0, 1) == 0 ? 'offline' : 'online'

        ];
    }
}
