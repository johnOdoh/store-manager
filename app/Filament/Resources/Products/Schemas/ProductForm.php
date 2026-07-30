<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enum\Product\BulkType;
use App\Enum\Product\SaleType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('store_id')
                    ->label('Store')
                    ->required()
                    ->relationship('store', 'name'),
                TextInput::make('name')
                    ->placeholder('Product Name')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->visibility('public')
                    ->maxSize(5120),
                Select::make('sale_type')
                    ->required()
                    ->options(SaleType::class)
                    ->hint(new HtmlString(Blade::render('<x-filament::loading-indicator class="h-5 w-5" wire:loading wire:target="data.sale_type" />')))
                    ->live(),
                Fieldset::make('Unit Details (cup, length, yards, pound etc.)')
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ])
                    ->visible(fn($get) => $get('sale_type') === SaleType::SINGLE || $get('sale_type') === SaleType::BOTH)
                    ->schema([
                        TextInput::make('qty_of_unit_available')
                            ->label('Qty of Unit Available')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder(0),
                        TextInput::make('cost_price_per_unit')
                            ->label('Cost Price Per Unit')
                            ->required()
                            ->prefix('₦')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.00)
                            ->placeholder(0.0),
                        TextInput::make('bid_price_per_unit')
                            ->label('Bid Price Per Unit')
                            ->prefix('₦')
                            ->required()
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.00)
                            ->placeholder(0.0),
                        TextInput::make('last_price_per_unit')
                            ->label('Last Price Per Unit')
                            ->prefix('₦')
                            ->required()
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.00)
                            ->placeholder(0.0),
                    ]),
                Fieldset::make('Bulk Details')
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ])
                    ->visible(fn($get) => $get('sale_type') === SaleType::BULK || $get('sale_type') === SaleType::BOTH)
                    ->schema([
                        Select::make('bulk_type')
                            ->required()
                            ->options(BulkType::class)
                            ->hint(new HtmlString(Blade::render('<x-filament::loading-indicator class="h-5 w-5" wire:loading wire:target="data.bulk_type" />')))
                            ->live(),
                        TextInput::make('qty_per_bulk')
                            ->label(fn($get) => $get('bulk_type') ? "Qty of Units Per " . ucfirst($get('bulk_type')->value) : 'Qty of Units Per Bulk')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder(0),
                        TextInput::make('qty_of_bulk_available')
                            ->label(fn($get) => $get('bulk_type') ? ucfirst($get('bulk_type')->value) . " Available" : 'Bulk Available')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder(0),
                        TextInput::make('cost_price_per_bulk')
                            ->label(fn($get) => $get('bulk_type') ? "Cost Price Per " . ucfirst($get('bulk_type')->value) : 'Cost Price Per Bulk')
                            ->required()
                            ->prefix('₦')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.01)
                            ->placeholder(0.0),
                        TextInput::make('bid_price_per_bulk')
                            ->label(fn($get) => $get('bulk_type') ? "Bid Price Per " . ucfirst($get('bulk_type')->value) : 'Bid Price Per Bulk')
                            ->required()
                            ->prefix('₦')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.00)
                            ->placeholder(0.0),
                        TextInput::make('last_price_per_bulk')
                            ->label(fn($get) => $get('bulk_type') ? "Last Price Per " . ucfirst($get('bulk_type')->value) : 'Last Price Per Bulk')
                            ->required()
                            ->prefix('₦')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0.00)
                            ->placeholder(0.0),
                    ]),
            ]);
    }
}
