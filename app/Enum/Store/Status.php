<?php

namespace App\Enum\Store;

enum Status: string
{
    case Pending = 'Pending';
    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';

    public static function toArray(): array
    {
        return array_map(fn(self $status) => $status->value, self::cases());
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $status) => [$status->value => $status->value])
            ->toArray();
    }
}
