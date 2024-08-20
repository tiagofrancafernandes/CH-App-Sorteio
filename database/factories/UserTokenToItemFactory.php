<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserTokenToItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTokenToItem>
 */
class UserTokenToItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resource' => null,
            'resource_key1' => null,
            'resource_key1_value' => null,
            'resource_key2' => null,
            'resource_key2_value' => null,
            'token' => UserTokenToItem::generateToken(),
            'expires_at' => fake()->boolean(90) ? try_parse_date(
                fake()->dateTimeBetween('-1 day', '15 days'),
            ) : null,
            'user_id' => User::inRandomOrder()->first() ?: User::factory(),
        ];
    }
}
