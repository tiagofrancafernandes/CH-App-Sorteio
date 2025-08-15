<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Wallet;
use Illuminate\Contracts\Database\Eloquent\Builder;

class WalletController extends Controller
{
    public function list(Request $request, ?string $currency = null) // WIP
    {
        $user = $request->user();
        abort_unless($user, 401);

        $currency = filter_var($currency ?: $request->input($currency), FILTER_DEFAULT, FILTER_NULL_ON_FAILURE);
        $currencies = Currency::currencies(true);
        $currency = $currency ? strtoupper($currency) : null;
        $currency = $currency ? $currencies[$currency]['code'] ?? null : null;

        $wallets = Wallet::where(
            'user_id',
            $user?->id
        )->select([
            'id',
            'title',
            'description',
            'currency',
            'user_id',
        ])
        ->when(
            $currency,
            fn (Builder $q) => $q?->where('currency', $currency)
        )->limit(50)->get();

        return response()?->json(
            [
                'wallets' => $wallets,
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

        $user = $request->user();

        abort_unless($user, 401);

        $wallet = Wallet::where('user_id', $user?->id)->select([
            'id',
            'title',
            'description',
            'currency',
            'user_id',
        ])->findOrFail($walletId);

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

        $request->authenticate();

        abort_unless(str($walletId)->isUuid(), 404);

        $user = $request->user();

        abort_unless($user, 401);

        $wallet = Wallet::where('user_id', $user?->id)->select([
            'id',
            'title',
            'description',
            'currency',
            'user_id',
        ])->findOrFail($walletId);

        $user?->setActiveWallet($wallet?->id);
        $success = $user?->activeWallet() === $wallet?->id;

        return response()?->json([
            'success' => $success,
            'wallet' => $wallet,
            'message' => __($success ? 'Wallet updated successfully' : 'Fail on update wallet'),
            'time' => $time = date('c'),
            'ip' => request()?->ip(),
            'request' => app()?->isProduction() ? null : $request?->all(),
        ], $success ? 200 : 422);
    }
}
