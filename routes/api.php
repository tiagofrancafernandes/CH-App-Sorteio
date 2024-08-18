<?php

use App\Http\Controllers\Api\V1\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\V1\RaffleGroupController;

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

Route::match(['get', 'post'], 'raffle_group/list/{currency?}', [RaffleGroupController::class, 'list'])
        ?->middleware([
            // 'auth',
        ])
    ?->where('currency', '^([a-zA-Z]{3})$')
        ?->name('api.raffle_group.list');

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

Route::prefix('fake-job-control')->group(function () {
    Route::get('dispatch/{jobName}', function (string $jobName) {
        $jobId = uniqid();
        $jobStatus = cache()->remember('fake_job_id_' . $jobId, (24 * 60 * 60), fn () => 'running');

        return response()->json([
            'job' => [
                'id' => $jobId,
                'status' => $jobStatus,
            ],
        ]);
    });

    Route::get('status/{jobId}', function (string $jobId) {
        $key = 'fake_job_id_' . $jobId;

        if (!cache()->has($key)) {
            return response()->json([
                'message' => 'Job not found!',
            ], 404);
        }

        $jobStatus = cache()->remember($key, (24 * 60 * 60), fn () => 'running');

        return response()->json([
            'job' => [
                'id' => $jobId,
                'status' => $jobStatus,
            ],
        ]);
    });

    Route::get('set-status/{jobId}/{jobStatus?}', function (string $jobId, ?string $jobStatus = null) {
        $key = 'fake_job_id_' . $jobId;

        if (!cache()->has($key)) {
            return response()->json([
                'message' => 'Job not found!',
            ], 404);
        }

        $statuses = ['finished', 'fail', 'running', 'waiting'];
        $jobStatus = $jobStatus && in_array($jobStatus, $statuses) ? $jobStatus : Arr::random($statuses);

        cache()->put($key, $jobStatus, (24 * 60 * 60));

        return response()->json([
            'job' => [
                'id' => $jobId,
                'status' => $jobStatus,
            ],
        ]);
    });
});
