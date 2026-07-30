<?php

namespace App\Enum\Product;

use Filament\Support\Contracts\HasLabel;

enum BulkType: string implements HasLabel
{
    case bag = 'Bag';
    case box = 'Box';
    case bundle = 'Bundle';
    case carton = 'Carton';
    case crate = 'Crate';
    case dozen = 'Dozen';
    case roll = 'Roll';
    case other = 'Other';

    public function getLabel(): string
    {
        return match ($this) {
            self::bag => 'Bag',
            self::box => 'Box',
            self::bundle => 'Bundle',
            self::carton => 'Carton',
            self::crate => 'Crate',
            self::dozen => 'Dozen',
            self::roll => 'Roll',
            self::other => 'Other',
        };
    }
}