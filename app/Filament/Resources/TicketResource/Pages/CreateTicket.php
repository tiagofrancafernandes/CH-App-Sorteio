<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Forms;
use App\Models\TicketGroup;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    public ?string $previousUrl = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->afterValidation(function () {
                            // ...
                        })
                        ->beforeValidation(function () {
                            // ...
                        })
                        ->schema([
                            // \App\Filament\Forms\Components\Store\TicketRadio::make('produto'),
                            // \Filament\Forms\Components\Radio::make('status')
                            \App\Filament\Forms\Components\Store\TicketRadio::make('status')
                            ->inline()
                            ->helperText(
                                fn () => html()
                                ->div(<<<'HTML'
                                    conteudo da div
                                HTML)
                                ->addChild(
                                    html()
                                        ->div()
                                        ->attribute('x-text', 'selectedItem')
                                )
                            )
                            ->hiddenLabel()
                            ->options([
                                'prod_01' => 'Prod #01',
                                'prod_02' => 'Prod #02',
                                'prod_03' => 'Prod #03',
                                'prod_04' => 'Prod #04',
                                'prod_05' => 'Prod #05',
                                'prod_06' => 'Prod #06',
                                'prod_07' => 'Prod #07',
                                'prod_08' => 'Prod #08',
                                'prod_09' => 'Prod #09',
                                'prod_10' => 'Prod #10',
                                'prod_11' => 'Prod #11',
                                'prod_12' => 'Prod #12',
                                'prod_13' => 'Prod #13',
                                'prod_14' => 'Prod #14',
                                'prod_15' => 'Prod #15',
                                'prod_16' => 'Prod #16',
                                'prod_17' => 'Prod #17',
                            ])
                            // ->live()
                            ->columnSpanFull()
                            ->descriptions([
                                'prod_01' => 'Prod #01 desc',
                                'prod_02' => 'Prod #02 desc',
                                'prod_03' => 'Prod #03 desc',
                                'prod_04' => 'Prod #04 desc',
                                'prod_05' => 'Prod #05 desc',
                                'prod_06' => 'Prod #06 desc',
                                'prod_07' => 'Prod #07 desc',
                                'prod_08' => 'Prod #08 desc',
                                'prod_09' => 'Prod #09 desc',
                                'prod_10' => 'Prod #10 desc',
                                'prod_11' => 'Prod #11 desc',
                                'prod_12' => 'Prod #12 desc',
                                'prod_13' => 'Prod #13 desc',
                                'prod_14' => 'Prod #14 desc',
                                'prod_15' => 'Prod #15 desc',
                                'prod_16' => 'Prod #16 desc',
                                'prod_17' => 'Prod #17 desc',
                            ])
                            ->required(),
                        ])
                        ->extraAttributes([
                            'x-data' => "{
                                collapsedCartBar: false,
                                selectedItem: null,
                                valueIsEqual(value) {
                                    return this.selectedItem == value;
                                },
                                setItem(value, livewireStatePath = null) {
                                    this.selectedItem = value;

                                    if (livewireStatePath === '' || livewireStatePath === null) {
                                        return;
                                    }

                                    \$wire?.get(livewireStatePath, value);
                                    \$wire.call('\$refresh');
                                },
                                valueIsEqual(value) {
                                    return this.selectedItem == value;
                                },
                                hasSelectedItem() {
                                    return !!this.selectedItem;
                                },
                                get isCollapsedCartBar() {
                                    return !!this.collapsedCartBar;
                                },
                                toggleCollapsedCartBar() {
                                    this.collapsedCartBar = !this.collapsedCartBar;
                                },
                                removeSelectedItem() {
                                    this.collapsedCartBar = false;
                                    this.selectedItem = null;
                                },
                                getFromWire(key = null, asString = false) {
                                    let wireValue = \$wire ? \$wire?.get(key) : null;

                                    console.log('key', key, wireValue, );

                                    return asString ? `\${wireValue}` : wireValue;
                                },
                                compare(firstValue = null, secondValue = null, operator = '==') {
                                    if (operator === '==') {
                                        return firstValue == secondValue;
                                    }

                                    if (operator === '===') {
                                        return firstValue === secondValue;
                                    }

                                    if (operator === '|||') {
                                        return (!!(firstValue) || !!(secondValue)) ? true : false;
                                    }

                                    if (operator === '!=') {
                                        return firstValue != secondValue;
                                    }

                                    if (operator === '!==') {
                                        return firstValue !== secondValue;
                                    }

                                    return firstValue == secondValue;
                                },
                            }",
                        ], true),
                    Wizard\Step::make('Delivery')
                        ->schema([
                            Forms\Components\Select::make('ticket_group_id')
                                // ->required()
                                ->options([
                                    1 => 'Grupo #1',
                                    2 => 'Grupo #2',
                                    3 => 'Grupo #3',
                                    4 => 'Grupo #4',
                                ]),

                            Forms\Components\TextInput::make('number')
                                // ->required()
                                ->numeric(),
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            // ...
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $ticketGroup = TicketGroup::openGroups()->first() ?: TicketGroup::factory()->createOne();
        $data['ticket_group_id'] = $ticketGroup?->id;

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('models.Ticket.notifications.createdNotificationTitle');
    }
}
