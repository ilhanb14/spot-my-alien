<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UfoShapeResource\Pages;
use App\Filament\Resources\UfoShapeResource\RelationManagers;
use App\Models\UfoShape;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UfoShapeResource extends Resource
{
    protected static ?string $model = UfoShape::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'UFO-vorm';
    protected static ?string $pluralLabel = 'UFO-vormen';
    protected static ?string $navigationGroup = 'Beheer';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->maxLength(255)->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->label('ufo vorm foto')
                    ->directory('ufo-shapes')
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
                    ->visibility('public')

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
            'index' => Pages\ListUfoShapes::route('/'),
            'create' => Pages\CreateUfoShape::route('/create'),
            'edit' => Pages\EditUfoShape::route('/{record}/edit'),
        ];
    }
}
