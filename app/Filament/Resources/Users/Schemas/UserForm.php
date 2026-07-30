<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enum\User\Role;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->placeholder('Full Name'),
                TextInput::make('username')
                    ->required()
                    ->placeholder('Username')
                    ->unique(ignoreRecord: true),
                TextInput::make('email')
                    ->placeholder('Email address')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('phone')
                    ->placeholder('Phone Number')
                    ->tel()
                    ->required(),
                Select::make('role')
                    ->required()
                    ->options(Role::toOptions()),
                Select::make('store_id')
                    ->label('Store')
                    ->relationship('store', 'name')
                    ->required()
            ]);
    }
}