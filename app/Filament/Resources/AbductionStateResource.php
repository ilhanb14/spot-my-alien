<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbductionStateResource\Pages;
use App\Filament\Resources\AbductionStateResource\RelationManagers;
use App\Models\AbductionState;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbductionStateResource extends Resource
{
    protected static ?string $model = AbductionState::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = "Terugkeer-staat";
    protected static ?string $pluralLabel = "Terugkeer-staten";
    protected static ?string $navigationGroup = 'Beheer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Naam')
                ->required()
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAbductionStates::route('/'),
            'create' => Pages\CreateAbductionState::route('/create'),
            'edit' => Pages\EditAbductionState::route('/{record}/edit'),
        ];
    }
}
