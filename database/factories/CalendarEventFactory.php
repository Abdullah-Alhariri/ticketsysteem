<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarEvent>
 */
class CalendarEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'display' => $this->faker->name,
            'start_date' => $this->faker->dateTime('now'),
            'end_date' => $this->faker->dateTime(),
            'tickets' => $this->faker->numberBetween(50, 500),
            'price' => $this->faker->numberBetween(15, 200),
            'location' => $this->faker->city(),
            'description' =>$this->faker->text(500)
        ];
    }
}
