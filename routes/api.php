<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());

Route::post('auth/login', function (LoginRequest $request) { // WIP
    $request->authenticate();
    $user = $request?->user();

    if (!$user) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    return response()?->json([
        'user' => $user,
        'token' => $user?->createToken('api_auth_login'),
    ]);
})?->name('api.auth.login');

Route::match(['get', 'post'], 'wallet/{walletId}/balance', function (LoginRequest $request, string $walletId) { // WIP
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

    return response()?->json([
        'uuid' => $walletId,
        'active_wallet_uuid' => $user?->activeWallet(),
        'user' => $user,
        'title' => 'Enjoy',
        'description' => 'My wallet',
        'balance' => (rand(0, 100) * 5) . '.' . (rand(0, 9) . rand(0, 9)), // WIP
        'currency' => [ // WIP
            'code' => 'BRL',
            'sign' => '$',
            'locale' => 'pt-BR',
        ],
        'time' => $time = date('c'),
        'lastUpdate' => $time,
        'ip' => request()?->ip(),
        'request' => app()?->isProduction() ? null : $request?->all(),
    ]);
})
        ?->where([
            // 'wallet' => '[a-z0-9\-]+',
            // 'wallet' => '^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$',
            'wallet' => '^[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}$',
        ])
        ?->name('api.wallet.balance');

Route::post('wallet/{walletId}/change', function (LoginRequest $request, string $walletId) { // WIP
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
})
        ?->where([
            'wallet' => '^[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}$',
        ])
        ?->name('api.wallet.change');
