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

Route::middleware([
    'auth',
    // 'auth:sanctum',
])->get('/user', fn (Request $request) => [$request?->user()]);

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

require_once __DIR__ . '/api-fake-routes.php';
