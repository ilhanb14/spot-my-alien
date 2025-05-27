<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbductionSightingResource\Pages;
use App\Filament\Resources\AbductionSightingResource\RelationManagers;
use App\Models\AbductionSighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbductionSightingResource extends Resource
{
    protected static ?string $model = AbductionSighting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->required()->maxLength(255),
                Forms\Components\TextInput::make('duration')
                    ->maxLength(255),
                Forms\Components\Select::make('abduction_state_id')
                    ->relationship('abductionstate', 'name')->columnSpan(2),
                Forms\Components\Checkbox::make('examination'),
                Forms\Components\Checkbox::make('returned'),
                Forms\Components\Checkbox::make('live_subject'),


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
            'index' => Pages\ListAbductionSightings::route('/'),
            'create' => Pages\CreateAbductionSighting::route('/create'),
            'edit' => Pages\EditAbductionSighting::route('/{record}/edit'),
        ];
    }
}
