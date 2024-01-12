<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Worktime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worktime>
 */
class WorktimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_worktime = $this->faker->time();

        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'date_worktime' => $this->faker->dateTimeBetween('2024-01-01', '2024-01-03'),
            'start_worktime' => $start_worktime,
            'end_worktime' => $this->faker->datetimeBetween($start_worktime, '23:59:59'),
        ];
    }
}
