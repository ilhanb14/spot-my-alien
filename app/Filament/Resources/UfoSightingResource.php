<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UfoSightingResource\Pages;
use App\Filament\Resources\UfoSightingResource\RelationManagers;
use App\Models\UfoSighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UfoSightingResource extends Resource
{
    protected static ?string $model = UfoSighting::class;
    protected static ?string $navigationGroup = 'Data';
    protected static ?string $label = 'UFO-Waarneming';
    protected static ?string $pluralLabel = 'UFO-Waarnemingen';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('speed')
                    ->label('snelheid')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10),
                Forms\Components\TextInput::make("color")
                    ->label("kleur")
                    ->maxLength(255),
                Forms\Components\Select::make('sighting_id')
                ->required()
                    ->relationship('sighting', 'description')
                    ->createOptionForm(
                        [
                            Forms\Components\DateTimePicker::make('date_time')
                                ->label('Datum en Tijd')
                                ->native(false)
                                ->seconds(false)
                                ->minutesStep(5)
                                ->maxDate(now())
                                ->required(),

                            Forms\Components\TextInput::make('location')
                                ->label('Locatie')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\Select::make('user_id')
                                ->label('Gebruiker')
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('type_id')
                                ->label('Type')
                                ->relationship('type', 'name')
                                ->required(),


                            Forms\Components\Textarea::make('description')
                                ->label('Omschrijving')
                                ->required(),

                            Forms\Components\Select::make('status_id')
                                ->relationship('status', 'name')->required()
                        ]

                    ),
                Forms\Components\Select::make('shape_id')
                    ->relationship('ufoshape', 'name')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("sighting.user.name")->label('gebruikersnaam'),
                TextColumn::make("sighting.description")->label('omschrijving'),
                TextColumn::make("sighting.location")->label('locatie'),
                TextColumn::make('ufoshape.name'),
                TextColumn::make('sighting.created_at')->label('Meldingsdatum')
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
            'index' => Pages\ListUfoSightings::route('/'),
            'create' => Pages\CreateUfoSighting::route('/create'),
            'edit' => Pages\EditUfoSighting::route('/{record}/edit'),
        ];
    }
}
