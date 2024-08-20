<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

// use App\Models\ResourcePassword;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourcePassword>
 */
class ResourcePasswordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resource' => User::class,
            'resource_key' => 'id',
            'resource_value' => (User::inRandomOrder()->first() ?: User::factory()?->create())?->id,
            'route_name' => null,
            'route_params' => null,
            'uri' => null,
            'password' => '$2y$12$OOC1iCpIbQ8ZP9qQCSpvEOzv92SbznoJ15/5sMgQpK/Oee.bdnRh.', // 123456
        ];
    }
}
