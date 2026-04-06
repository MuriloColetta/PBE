<?php

namespace App\Filament\Resources\MovimentacaoEstoques;

use App\Filament\Resources\MovimentacaoEstoques\Pages\CreateMovimentacaoEstoque;
use App\Filament\Resources\MovimentacaoEstoques\Pages\EditMovimentacaoEstoque;
use App\Filament\Resources\MovimentacaoEstoques\Pages\ListMovimentacaoEstoques;
use App\Filament\Resources\MovimentacaoEstoques\Pages\ViewMovimentacaoEstoque;
use App\Filament\Resources\MovimentacaoEstoques\Schemas\MovimentacaoEstoqueForm;
use App\Filament\Resources\MovimentacaoEstoques\Schemas\MovimentacaoEstoqueInfolist;
use App\Filament\Resources\MovimentacaoEstoques\Tables\MovimentacaoEstoquesTable;
use App\Models\MovimentacaoEstoque;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;

class MovimentacaoEstoqueResource extends Resource
{
    protected static ?string $model = MovimentacaoEstoque::class;
    protected static string|UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Movimentação do Estoque';

    public static function form(Schema $schema): Schema
    {
        return MovimentacaoEstoqueForm::configure($schema)
        ->schema([
                Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->label('Produto')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),

                Select::make('tipo')
                    ->label('Tipo de Movimentação')
                    ->options([
                        'entrada' => 'Entrada (Adicionar ao Estoque)',
                        'saida' => 'Saída (Retirar do Estoque)',
                    ])
                    ->required()
                    ->native(false),

                TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->helperText('Apenas números inteiros positivos (ex: 10).'),

                TextInput::make('observacao')
                    ->label('Observação / Motivo')
                    ->maxLength(255)
                    ->placeholder('Ex: Compra do fornecedor, devolução, ajuste manual...')
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MovimentacaoEstoqueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MovimentacaoEstoquesTable::configure($table)
        ->columns([
            TextColumn::make('created_at')
                ->label('Data')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
            TextColumn::make('produto.nome')
                ->label('Produto')
                ->searchable()
                ->sortable(),

            TextColumn::make('tipo')
                ->label('Tipo')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'entrada' => 'success',
                    'saida' => 'danger',
                }),
            TextColumn::make('quantidade')
                ->label('Qtd')
                ->numeric()
                ->sortable(),
            TextColumn::make('observacao')
                ->label('Observação')
                ->searchable(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            //
        ])
        ->toolbarActions([
            DeleteBulkAction::make(),
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
            'index' => ListMovimentacaoEstoques::route('/'),
            'create' => CreateMovimentacaoEstoque::route('/create'),
            'view' => ViewMovimentacaoEstoque::route('/{record}'),
            'edit' => EditMovimentacaoEstoque::route('/{record}/edit'),
        ];
    }
}
