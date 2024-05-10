<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
// use Filament\Resources\Resource;
use App\Filament\Resources\Extended\ExtendedResourceBase as Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('filament/groups.Tickets.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('models.Ticket.model_label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('models.Ticket.plural_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('models.Ticket.navigation_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Select::make('user_id')
                    ->required()
                ->relationship('user', 'name')
                ->searchable(['id', 'currency'])
                ->preload()
                ->required(),

                    Forms\Components\Select::make('ticket_group_id')
                    ->required()
                    ->relationship('ticketGroup', 'id')
                    ->searchable(['id'])
                    ->preload()
                    ->required(),

                    Forms\Components\TextInput::make('number')
                        ->required()
                        ->numeric(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ticket_group_id')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('number')
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
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            // 'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
