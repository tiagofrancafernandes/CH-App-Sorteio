<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\WalletController;
use App\Http\Controllers\Api\V1\RaffleGroupController;

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

Route::match(['get', 'post'], 'group/check-pass/{groupId?}', function (Request $request, ?string $groupId = null) {
    if (filled($groupId) && !$request?->input('groupId')) {
        $request->merge([
            'groupId' => $groupId,
        ]);
    }

    $request->validate([
        'groupId' => 'required',
        'pass_code' => 'required|string|min:3',
    ]);

    return response()->json([
        'groupId' => $groupId,
        'token' => Hash::make($request?->input('pass_code')),
    ]);
})
    ?->middleware([
        // 'auth',
    ])
    ?->name('api.group.check_pass');
