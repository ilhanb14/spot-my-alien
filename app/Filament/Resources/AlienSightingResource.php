<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlienSightingResource\Pages;
use App\Filament\Resources\AlienSightingResource\RelationManagers;
use App\Models\AlienSighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlienSightingResource extends Resource
{
    protected static ?string $model = AlienSighting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('aggression_level')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10),
                Forms\Components\TextInput::make('intelligence_level')
                    ->minValue(0)
                    ->maxValue(10)
                    ->numeric(),
                Forms\Components\TextInput::make('known_language')
                    ->maxLength(255),
                Forms\Components\TextInput::make('food_source')
                    ->maxLength(255),
                Forms\Components\TextInput::make('speed')
                    ->numeric()->minValue(0)
                    ->maxValue(10),
                Forms\Components\Select::make('sighting_id')
                    ->relationship('sighting', 'description'),
                Forms\components\Select::make('shape_id')
                    ->relationship('alienShape', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAlienSightings::route('/'),
            'create' => Pages\CreateAlienSighting::route('/create'),
            'edit' => Pages\EditAlienSighting::route('/{record}/edit'),
        ];
    }
}
