<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\WalletTransactionStatus;
use Illuminate\Support\Arr;
use App\Enums\WalletTransactionType;
use App\Enums\WalletTransactionMode;
use App\Models\Wallet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalletTransaction>
 */
class WalletTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => Arr::random(WalletTransactionType::cases()),
            'mode' => fn (array $attr): WalletTransactionMode => WalletTransactionType::tryGetMode($attr['type'] ?? ''),
            'amount' => fake()->regexify('([0-9]){2,3}\.([0]){2}'),
            'description' => 'Fake transaction ' . fake()->words(3, true),
            'label' => fn (array $attr): mixed => str()->of(($attr['type'] ?? null)?->name)->title()->headLine() ?? null,
            'status' => Arr::random(WalletTransactionStatus::cases()),
            'is_a_success_status' => fn (array $attr): bool => WalletTransactionStatus::isSuccess($attr['status'] ?? null),
            'extra_info' => [],
            'log' => sprintf('[%s] %s', date('c'), 'Some factory text.'),

            'transaction_connector' => 'App\PaymentGateways\SomePay',
            'transaction_connector_id' => 'a-some-pay-gateway-id-' . mt_rand(),
            'transaction_connector_info' => fn (array $attr) => [
                'transaction_connector_id' => $attr['transaction_connector_id'] ?? null,
                'other-some-pay-info' => 'bla bla bla',
            ],

            //

            'wallet_id' => fn (array $attr): mixed => fake()->boolean(30)
                ? Wallet::factory() : (Wallet::inRandomOrder()->first() ?? Wallet::factory()),
            'parent_transaction' => null,

            'long_microtime' => long_microtime(false),
        ];
    }
}
