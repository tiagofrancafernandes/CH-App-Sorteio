<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Models\User;

class TicketsController extends Controller
{
    /**
     * function new
     *
     * @param Request request
     *
     * @return \Inertia\Response
     */
    public function new(Request $request): \Inertia\Response
    {
        /**
         * @var ?User $user
         */
        $user = auth()->user();

        return Inertia::render('Tickets/NewTicket', [
            'query' => $request->query(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'ticketGroupList' => static::getGroupList($request),
            'userWalletList' => $user?->walletList,
        ]);
    }

    /**
     * function getGroupList
     *
     * @param ?Request $request
     * @return Collection|array
     */
    public static function getGroupList(?Request $request = null): Collection|array
    {
        $taxaAdmPorParticipante = 0.25;

        $numeroDeBilhetes = 1;

        $configGrupos = [
            // valor|participantes|moeda
            [2.00, [10, 20], 'BRL'],
            [5.00, [10, 20, 30], 'BRL'],
            [10.00, [10, 20, 30, 40, 50], 'BRL'],
            [15.00, [10, 20, 30, 40, 50], 'BRL'],
            [20.00, [20, 30, 40, 50], 'BRL'],
            [30.00, [20, 40, 60], 'BRL'],
        ];

        foreach ($configGrupos as $configGrupo) {
            foreach ($configGrupo[1] as $participantes) {
                $grupos[] = [
                    'currency' => $configGrupo[2] ?? 'BRL',
                    'amount' => ($valor = $configGrupo[0]),
                    'amountStr' => number_format($valor, 2),
                    'maximumNumberOfParticipants' => $participantes,
                    'admFee' => ($taxaAdm = $participantes * $taxaAdmPorParticipante),
                    'prize' => ($valor * $participantes) - $taxaAdm,
                    'probability' => $probabilidade = number_format(($numeroDeBilhetes / $participantes), 3),
                    'probabilityInPercent' => number_format($probabilidade, 3),
                    'probabilityAsStr' => $probabilidadeInPercent = number_format($probabilidade * 100, 2),
                    'probabilityAsText' => "A probabilidade de ser sorteado é de {$numeroDeBilhetes} pra {$participantes} ({$probabilidade}) ou {$probabilidadeInPercent}%",
                ];
            }
        }

        // dump(collect($grupos)->groupBy('amount'));
        // dump(collect($grupos)->groupBy('maximumNumberOfParticipants'));
        // dump(collect($grupos)->groupBy('prize'));
        // dump(collect($grupos)->groupBy('probabilityAsStr'));
        // dump(collect($grupos)->groupBy('probabilityInPercent'));

        // $primeiroBilhete = collect(collect($grupos)->first());

        ## Objetivo: identificar o grupo ao qual pertence
        // $md5GroupTag = md5(
        //     http_build_query(
        //         $primeiroBilhete->only([
        //             'amount', 'amountStr', 'admFee', 'prize', 'maximumNumberOfParticipants', 'currency',
        //         ])->toArray()
        //     )
        // );

        // dump($md5GroupTag);

        $addAttributes = function ($gruposData) {
            return collect($gruposData)
                ->map(function ($item) {
                    $item = collect($item);

                    $buildQuery = http_build_query(
                        $item->only([
                            'amount', 'amountStr', 'admFee', 'prize', 'maximumNumberOfParticipants', 'currency',
                        ])->toArray()
                    );

                    $hash = md5($buildQuery);

                    $item->put('hash', $hash);
                    $item->put('buildQuery', $buildQuery);

                    return $item;
                })->values();
        };

        return [
            'all' => $addAttributes($grupos),
            'filtered' => [
                // Maior prêmio
                'morePrize' => $addAttributes(collect($grupos)->sortByDesc('prize')->values()),

                // Maior probabilidade de ganhar e menor valor de ingresso
                'highChance' => $addAttributes(collect($grupos)->sortByDesc('probabilityInPercent')->sortBy('amount')->values()),

                // Maior probabilidade e maior prize
                'highChanceAndMorePrize' => $addAttributes(collect($grupos)->sortByDesc('prize')->sortByDesc('probabilityInPercent')->values()),

                // Maior probabilidade de ganhar
                'lessCompetition' => $addAttributes(collect($grupos)->sortByDesc('probabilityInPercent')->values()),
            ],
        ];
    }
}
