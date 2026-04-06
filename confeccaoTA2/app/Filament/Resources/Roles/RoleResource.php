<?php

namespace App\Filament\Resources\Roles;

use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\Pages\ViewRole;
use App\Filament\Resources\Roles\Schemas\RoleForm;
use App\Filament\Resources\Roles\Schemas\RoleInfolist;
use App\Filament\Resources\Roles\Tables\RolesTable;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;
    protected static string|UnitEnum|null $navigationGroup = 'Administração';
    protected static ?int $navigationSort = 2;

    // public static function canAccess(): bool
    // {
    //     return auth()->user()?->hasRole('Admin') ?? false;
    // }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Cargos e Funções';

    public static function form(Schema $schema): Schema
    {
        return RoleForm::configure($schema)
        ->schema([
            TextInput::make('name')
                ->label('Nome do Cargo')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
                
            Select::make('permissions')
                ->label('Permissões de Acesso')
                ->multiple()
                ->relationship('permissions', 'name')
                ->preload()
                ->columnSpanFull(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolesTable::configure($table)
        ->columns([
            TextColumn::make('name')
                ->label('Nome do Cargo')
                ->searchable()
                ->sortable(),
                
            TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime('d/m/Y')
                ->sortable(),
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
