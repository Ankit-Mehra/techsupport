<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Category;
use app\Models\Priority;
use app\Models\Status;
use app\Models\Ticket;
use app\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory\app\Model<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'status_id' => Status::inRandomOrder()->first()->id,
            'priority_id' => Priority::inRandomOrder()->first()->id,
            'agent_id' => null,
            'closed_at' => null,
        ];
    }
}
