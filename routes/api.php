<?php

use App\Http\Controllers\Api\V1\WalletController;
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

Route::match(['get', 'post'], 'wallet/list/{currency?}', [WalletController::class, 'list'])
        ?->middleware([
            // 'auth',
        ])
    ?->where('currency', '^([a-zA-Z]{3})$')
        ?->name('api.wallet.list');

Route::match(['get', 'post'], 'wallet/{walletId}/balance', [WalletController::class, 'balance'])
        ?->where('wallet', '^[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}$')
        ?->middleware([
            // 'auth',
        ])
        ?->name('api.wallet.balance');

Route::post('wallet/{walletId}/change', [WalletController::class, 'changeToWallet'])
    // ?->where('wallet', '^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$')
        ?->where('wallet', '^[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}$')
        ?->name('api.wallet.change');
