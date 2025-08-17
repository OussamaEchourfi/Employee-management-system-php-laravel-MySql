<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses = ['pending', 'in_progress', 'completed'];
        
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement($statuses),
            'priority' => $this->faker->randomElement($priorities),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'employe_id' => Employe::factory(),
            'assigned_by' => User::factory(),
            'completed_at' => $this->faker->optional(0.3)->dateTimeBetween('-30 days', 'now'),
        ];
    }

    /**
     * Indicate that the task is pending.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pending',
                'completed_at' => null,
            ];
        });
    }

    /**
     * Indicate that the task is in progress.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inProgress()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'in_progress',
                'completed_at' => null,
            ];
        });
    }

    /**
     * Indicate that the task is completed.
     *
     * @return \Illuminate\Database\Eloquent\Factory
     */
    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'completed',
                'completed_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            ];
        });
    }

    /**
     * Indicate that the task is urgent.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function urgent()
    {
        return $this->state(function (array $attributes) {
            return [
                'priority' => 'urgent',
            ];
        });
    }
}
