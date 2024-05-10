<?php

namespace App\Filament\Resources\TicketGroupResource\Pages;

use App\Filament\Resources\TicketGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTicketGroup extends EditRecord
{
    protected static string $resource = TicketGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
