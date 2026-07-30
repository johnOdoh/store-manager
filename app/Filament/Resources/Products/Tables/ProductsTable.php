<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('#')
                    ->rowIndex()
                    ->sortable(),
                TextColumn::make('store.name'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('sale_type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('bulk_type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('amount_earned')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('profit_earned')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}