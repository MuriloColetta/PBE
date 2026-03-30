<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Usuários';

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema)
        ->schema([
            TextInput::make('name')
            ->label('Nome Completo'),

            TextInput::make('email')
            ->label('E-mail')
            ->email(),

            TextInput::make('password')
            ->label('Senha de Acesso'),
            
            Select::make('roles')
            ->label('Cargos')
            ->multiple()
            ->relationship('roles', 'name')
            ->preload()
            ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table)
        ->columns([
            TextColumn::make('name')
            ->searchable(),

            TextColumn::make('email')
            ->label('Email address')
            ->searchable(),

            TextColumn::make('role.name')
            ->label('Cargo')
            ->searchable(),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
