<?php

namespace Database\Seeders\FakeHelpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FakeWalletHelpers
{
    public static function fakeWallet(int $count = 1, array $mergeValues = []): Collection
    {
        $baseData = fn () => [
            'title' =>  'Wallet ' . ucwords(fake()->words(1, true)),
            'description' => fake()->words(3, true),
            'balance' => (rand(0, 100) * 5) . '.' . (rand(0, 9) . rand(0, 9)), // WIP
            'currency' => Arr::random(array_values(static::currencies())),
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
        return \App\Enums\Currency::currencies(true);
    }
}
