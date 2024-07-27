<?php

namespace Database\Seeders\FakeHelpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Helpers\StringHelpers;

class FakeRaffleGroupHelpers
{
    public static function fakeRaffleGroup(
        int $count = 1,
        array $mergeValues = [],
        ?int $slots = null,
    ): Collection {
        $fakeSlot = function (?int $slots = null, ?int $freeSlots = null) {
            $slots ??= 10 * rand(1, 10);
            $freeSlots ??= rand(0, $slots);

            $freeSlots = $freeSlots >= 0 && $freeSlots <= $slots ? $freeSlots : rand(0, $slots);

            return [
                'slots' => $slots,
                'freeSlots' => $freeSlots,
            ];
        };

        $baseData = fn () => [
            'title' =>  'Group ' . ucwords(fake()->words(1, true)),
            'uid' =>  StringHelpers::uidGenerator(),
            'description' => fake()->words(3, true),
            'price' => (rand(0, 20) * 5) . '.' . (rand(0, 9) . rand(0, 9)), // WIP
            'slots' => $fakeSlot($slots),
            'currency' => Arr::random(array_keys(static::currencies())),
            'premium' => $premium = fake()->boolean(70),
            'protected' => $premium ? fake()->boolean(70) : false,
            'join_password' => 'abc123',
        ];

        $wallets = collect();

        foreach (range(1, $count > 0 ? intval($count) : 1) as $i) {
            $wallets->push(
                array_merge(
                    $baseData(),
                    $mergeValues,
                    [
                        'uuid' => str()->uuid()?->toString(),
                    ],
                )
            );
        }

        return $wallets;
    }

    public static function currencies(): array
    {
        return FakeWalletHelpers::currencies();
    }
}
