<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enum\Product\SaleType;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('store.name'),
                TextEntry::make('name'),
                ImageEntry::make('image')
                    ->placeholder('-'),
                TextEntry::make('sale_type')
                    ->badge(),
                TextEntry::make('qty_of_unit_available')
                    ->numeric(),
                TextEntry::make('qty_of_unit_sold')
                    ->numeric(),
                TextEntry::make('cost_price_per_unit')
                    ->label('Cost Price per Unit (₦)')
                    ->numeric(),
                TextEntry::make('bid_price_per_unit')
                    ->label('Bid Price per Unit (₦)')
                    ->numeric(),
                TextEntry::make('last_price_per_unit')
                    ->label('Last Price per Unit (₦)')
                    ->numeric(),
                TextEntry::make('bulk_type')
                    ->badge()
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->placeholder('-'),
                TextEntry::make('qty_per_bulk')
                    ->label(fn($get) => $get('bulk_type') ? "Qty per {$get('bulk_type')->value}" : 'Qty per Bulk')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('qty_of_bulk_available')
                    ->label(fn($get) => $get('bulk_type') ? "Qty of {$get('bulk_type')->value} Available" : 'Qty of Bulk Available')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('qty_of_bulk_sold')
                    ->label(fn($get) => $get('bulk_type') ? "Qty of {$get('bulk_type')->value} Sold" : 'Qty of Bulk Sold')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('cost_price_per_bulk')
                    ->label(fn($get) => $get('bulk_type') ? "Cost Price per {$get('bulk_type')->value} (₦)" : 'Cost Price per Bulk (₦)')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('bid_price_per_bulk')
                    ->label(fn($get) => $get('bulk_type') ? "Bid Price per {$get('bulk_type')->value} (₦)" : 'Bid Price per Bulk (₦)')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('last_price_per_bulk')
                    ->label(fn($get) => $get('bulk_type') ? "Last Price per {$get('bulk_type')->value} (₦)" : 'Last Price per Bulk (₦)')
                    ->visible(fn($get) => $get('sale_type') === SaleType::BOTH || $get('sale_type') === SaleType::BULK)
                    ->numeric(),
                TextEntry::make('amount_earned')
                    ->label('Amount Earned (₦)')
                    ->numeric(),
                TextEntry::make('profit_earned')
                    ->label('Profit Earned (₦)')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
