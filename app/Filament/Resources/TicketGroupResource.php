<?php

namespace App\Filament\Resources;

use App\Enums\TicketGroupOperatingFreeMode;
use App\Enums\TicketGroupStatus;
use App\Filament\Resources\TicketGroupResource\Pages;
use App\Models\TicketGroup;
use Filament\Forms;
use Filament\Forms\Form;
// use Filament\Resources\Resource;
use App\Filament\Resources\Extended\ExtendedResourceBase as Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TicketGroupResource extends Resource
{
    protected static ?string $model = TicketGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('filament/groups.Tickets.navigation_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('currency')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options([
                        'BRL' => __('currency.brl.label'),
                        'USD' => __('currency.usd.label'),
                        'EUR' => __('currency.eur.label'),
                    ]),

                Forms\Components\DateTimePicker::make('draw_date_limit')
                    ->required(),
                Forms\Components\TextInput::make('maximum_of_participants')
                    ->numeric(),
                Forms\Components\TextInput::make('minimum_of_participants')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('individual_ticket_price')
                ->currencyMask(
                    thousandSeparator: '.',
                    decimalSeparator: ',',
                    precision: 2,
                )
                    ->live()
                    ->required(),

                Forms\Components\TextInput::make('operating_fee')
                ->currencyMask(
                    thousandSeparator: '.',
                    decimalSeparator: ',',
                    precision: 2,
                )
                    ->live()
                    ->required(),

                Forms\Components\Select::make('operating_fee_mode')
                ->searchable()
                ->options(
                    collect(TicketGroupOperatingFreeMode::cases())
                        ->mapWithKeys(fn ($enum) => [
                            $enum->value => $enum?->label(),
                        ])
                        ->toArray()
                )
                    ->allowHtml()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->searchable()
                    ->options(
                        collect(TicketGroupStatus::cases())
                            ->mapWithKeys(fn ($enum) => [
                                $enum->value => $enum?->label(),
                            ])
                            ->toArray()
                    )
                    ->allowHtml()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('draw_date_limit')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('maximum_of_participants')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('minimum_of_participants')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('individual_ticket_price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('operating_fee_mode')
            ->formatStateUsing(fn ($record) => $record->operating_fee_mode?->label())
            ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn ($record) => $record->status?->label())
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTicketGroups::route('/'),
            'create' => Pages\CreateTicketGroup::route('/create'),
            'edit' => Pages\EditTicketGroup::route('/{record}/edit'),
        ];
    }
}
