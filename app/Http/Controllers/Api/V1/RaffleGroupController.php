<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Database\Seeders\FakeHelpers\FakeRaffleGroupHelpers;
use Illuminate\Support\Collection;

class RaffleGroupController extends Controller
{
    public function list(Request $request, ?string $currency = null) // WIP
    {
        $user = $request->user();
        $page = $request->integer('page');
        $limit = $request->integer('limit', 20);
        $currentRaffleGroupUid = $request->input('current_raffle_group_uid');
        $item = $request->input('item');
        $item = is_array($item) ? $item : [];
        $currency = filter_var($currency ?: $request->input($currency), FILTER_DEFAULT, FILTER_NULL_ON_FAILURE);
        $currencies = FakeRaffleGroupHelpers::currencies();
        $currency = $currency ? strtoupper($currency) : null;
        $currency = $currency ? $currencies[$currency]['code'] ?? null : null;
        $slots = filter_var($item['slots'] ?? null, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

        $raffleGroups = cache()->remember(
            http_build_query([
                'name' => 'raffle_group_list',
                'user' => $user?->id,
                'currency' => $currency,
                'slots' => $slots,
                'page' => $page,
                'limit' => $limit,
                'md5_query' => md5($request->query()),
            ]),
            60,
            fn () => collect(FakeRaffleGroupHelpers::fakeRaffleGroup(
                $limit,
                array_filter([
                    'currency' => $currency ?: null,
                ]),
                $slots,
            ))->when(
                $currency,
                fn (Collection $items) => $items?->map(
                    fn ($item) => collect($item)?->put('currency', $currencies[$currency] ?? $currency)
                )
            )
        );

        return response()?->json(
            [
                'raffleGroups' => collect($raffleGroups)->filter(function ($rafflegroup) use ($currency) {
                    if (!filled($currency)) {
                        return $rafflegroup;
                    }

                    return str($rafflegroup['currency']['code'] ?? null)->upper()->toString() === $currency;
                })->values(),
                'pagination' => [
                    'pageCount' => 3,
                    'previousPage' => null,
                    'currentPage' => 1,
                    'nextPage' => 2,
                    'recordsCount' => 10,
                    'totalRecordsCount' => 28,
                ],
                'current_raffle_group_uid' => $currentRaffleGroupUid,
                'user' => $user,
                'item' => $item,
                'time' => $time = date('c'),
                'lastUpdate' => $time,
                'ip' => request()?->ip(),
                'request' => app()?->isProduction() ? null : $request?->all(),
            ]
        );
    }
}
