<?php

namespace App\Enum\Product;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SaleType: string implements HasColor, HasLabel
{
    case SINGLE = 'Single';
    case BULK = 'Bulk';
    case BOTH = 'Both';

    public function getLabel(): string
    {
        return match ($this) {
            self::SINGLE => 'Single',
            self::BULK => 'Bulk',
            self::BOTH => 'Both',
        };
    }

    public function getColor(): string|array
    {
        return match ($this) {
            self::SINGLE => Color::Green,
            self::BULK => Color::Purple,
            self::BOTH => Color::Yellow,
        };
    }
}