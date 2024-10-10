<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Database\Seeders\FakeHelpers\FakeWalletHelpers;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{
    public function list(Request $request, ?string $currency = null) // WIP
    {
        $user = $request->user();
        $currency = filter_var($currency ?: $request->input($currency), FILTER_DEFAULT, FILTER_NULL_ON_FAILURE);
        $currencies = FakeWalletHelpers::currencies();
        $currency = $currency ? strtoupper($currency) : null;
        $currency = $currency ? $currencies[$currency]['code'] ?? null : null;

        $wallets = cache()->remember(
            implode(',', ['wallet_list', 'user', $user?->id, $currency]),
            60,
            fn () => collect(
                array_merge(array_values($currencies), array_values($currencies))
            )
                ->map(
                    fn ($c) => FakeWalletHelpers::fakeWallet(
                        1,
                        ['currency' => $c]
                    )->first()
                )
        );

        return response()?->json(
            [
                'wallets' => collect($wallets)->filter(function ($wallet) use ($currency) {
                    if (!filled($currency)) {
                        return $wallet;
                    }

                    return str($wallet['currency']['code'] ?? null)->upper()->toString() === $currency;
                }),
                'active_wallet_uuid' => $user?->activeWallet(),
                'user' => $user,
                'time' => $time = date('c'),
                'lastUpdate' => $time,
                'ip' => request()?->ip(),
                'request' => app()?->isProduction() ? null : $request?->all(),
            ]
        );
    }

    public function balance(LoginRequest $request, string $walletId): JsonResponse // WIP
    {
        $request->authenticate();

        abort_unless(str($walletId)->isUuid(), 404);

        /**
         * TODO:
         * - Mover isso para uma controller
         * - Exigir token (fazer o usuário informar a senha, depois gerar um token TEMPORÁRIO que possa apenas ver saldo)
         */
        if (!str($walletId)?->isUuid()) {
            return response()?->json([
                'error' => $error = __('Not found'),
                'message' => $error,
            ], 404);
        }

        $user = $request->user();

        $wallet = cache()->remember(
            implode(',', ['wallet_balance', 'user', $user?->id, 'walletId', $walletId]),
            60,
            fn () => FakeWalletHelpers::fakeWallet(1)->first()
        );

        return response()?->json(
            array_merge(
                [
                    'active_wallet_uuid' => $user?->activeWallet(),
                    'user' => $user,
                    'time' => $time = date('c'),
                    'lastUpdate' => $time,
                    'ip' => request()?->ip(),
                    'request' => app()?->isProduction() ? null : $request?->all(),
                ],
                $wallet,
                [
                    'uuid' => $walletId,
                ],
            )
        );
    }

    public function changeToWallet(LoginRequest $request, string $walletId): JsonResponse // WIP
    {
        $request->authenticate();

        /**
         * TODO:
         * - Mover isso para uma controller
         * - Exigir token (fazer o usuário informar a senha, depois gerar um token TEMPORÁRIO que possa apenas ver saldo)
         */
        if (!str($walletId)?->isUuid()) {
            return response()?->json([
                'error' => $error = __('Not found'),
                'message' => $error,
            ], 404);
        }

        $user = $request->user();

        $user?->setActiveWallet($walletId);
        $success = $user?->activeWallet() === $walletId;

        return response()?->json([
            'success' => $success,
            'message' => __($success ? 'Wallet updated successfully' : 'Fail on update wallet'),
            'time' => $time = date('c'),
            'ip' => request()?->ip(),
            'request' => app()?->isProduction() ? null : $request?->all(),
        ], $success ? 200 : 422);
    }
}
