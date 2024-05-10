<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Pages\BuyNewTicket;

class ListTickets extends ListRecords
{
    protected static string $resource = TicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\CreateAction::make('buy-new')
                ->url(fn () => BuyNewTicket::getUrl())
                ->icon(BuyNewTicket::getNavigationIcon())
                ->label(BuyNewTicket::getNavigationLabel()),
        ];
    }
}
