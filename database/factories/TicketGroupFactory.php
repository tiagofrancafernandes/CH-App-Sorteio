<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketGroup>
 */
class TicketGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'currency' => 'BRL',
            'draw_date_limit' => now()->addDays(rand(0, 8)),
            'minimum_of_participants' => Arr::random([10, 10, 10, 20, 30]),
            'operating_fee' => 5,
            'operating_fee_mode' => Arr::random(\App\Enums\TicketGroupOperatingFreeMode::cases()),
            'status' => Arr::random(\App\Enums\TicketGroupStatus::cases()),
            'individual_ticket_price' => fake()->regexify('[1-5]{0,2}[05]{1}\.00'),
        ];
    }
}
