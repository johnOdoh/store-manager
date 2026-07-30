<?php

namespace App\Enum\User;

enum Role: string
{
    case ADMIN = 'Admin';
    case USER = 'User';
    case MANAGER = 'Manager';

    public static function toArray(): array
    {
        return array_map(fn(self $role) => $role->value, self::cases());
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $role) => [$role->value => $role->value])
            ->toArray();
    }
}