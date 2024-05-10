<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Filament\Resources\TicketResource;

class BuyNewTicket extends Page
{
    /**
     * Styled single icons:
     *  - majestic-ticket-text-solid
     *  - heroicon-m-ticket
     *  - iconpark-ticket
     *
     * CHECKED single icons:
     *  - majestic-ticket-check-solid (solid)
     *  - majestic-ticket-check-line (outlined)
     *
     * WINNER single icons:
     *  - zondicon-ticket
     *  - majestic-ticket-check-line
     *  - custom_icons-winner-ticket
     *
     * Two tickets icons:
     *  - majestic-tickets-solid (solid)
     *  - majestic-tickets-line (outlined)
     */
    protected static ?string $navigationIcon = 'majestic-ticket-text-solid';

    protected static string $view = 'filament.pages.buy-new-ticket';

    public static function getNavigationGroup(): ?string
    {
        return __('filament/groups.Tickets.navigation_label');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('my-current-groups')
                ->icon('carbon-group-presentation')
                ->url(url('/#fake-my-current-groups')),

            Action::make('my-tickets')
                ->icon('majestic-tickets-line')
                ->url(TicketResource::getUrl('index')),

            Action::make('with-confirmation-demo')
                ->requiresConfirmation()
                ->action(fn () => dd('Here')),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('filament/pages.new_ticket.navigation_label');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->canSeeBuyNewTicketPage(), 403);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->canSeeBuyNewTicketButton();
    }
}
