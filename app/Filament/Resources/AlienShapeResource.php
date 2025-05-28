<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlienShapeResource\Pages;
use App\Filament\Resources\AlienShapeResource\RelationManagers;
use App\Models\AlienShape;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlienShapeResource extends Resource
{
    protected static ?string $model = AlienShape::class;
    protected static ?string $navigationGroup = 'Beheer';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Alienvorm';
    protected static ?string $pluralLabel = 'Alienvormen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->maxLength(255)->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->label('Shape photo')
                    ->directory('alien-shapes')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Naam'),
                ImageColumn::make('image_path')
                    ->label('foto')
                    ->disk('public')
                    ->url(fn ($record) => asset('storage/' . $record->image_path))
                    ->openUrlInNewTab()
                    ->visibility('public'),

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
            'index' => Pages\ListAlienShapes::route('/'),
            'create' => Pages\CreateAlienShape::route('/create'),
            'edit' => Pages\EditAlienShape::route('/{record}/edit'),
        ];
    }
}
