<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlienSightingResource\Pages;
use App\Filament\Resources\AlienSightingResource\RelationManagers;
use App\Models\AlienSighting;
use App\Models\Sighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlienSightingResource extends Resource
{
    protected static ?string $model = AlienSighting::class;
    protected static ?string $label = 'Alien-waarneming';
    protected static ?string $pluralLabel = "Alien-waarnemingen";
    protected static ?string $navigationGroup = 'Data';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('aggression_level')
                    ->label('Niveau van agressie')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10),
                Forms\Components\TextInput::make('intelligence_level')
                    ->label("Niveau van intelligentie")
                    ->minValue(0)
                    ->maxValue(10)
                    ->numeric(),
                Forms\Components\TextInput::make('spoken_language')
                    ->label("gekende taal")
                    ->maxLength(255),
                Forms\Components\TextInput::make('food_source')
                    ->label("Voedselbron")
                    ->maxLength(255),
                Forms\Components\TextInput::make('speed')
                    ->label('snelheid')
                    ->numeric()->minValue(0)
                    ->maxValue(10),
                Forms\Components\Select::make('sighting_id')
                    ->relationship('sighting', 'description')
                    ->required()
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
                            Forms\Components\Hidden::make('type_id')
                                ->default(3),


                            Forms\Components\Textarea::make('description')
                                ->label('Omschrijving')
                                ->required(),

                            Forms\Components\Select::make('status_id')
                                ->default(1)
                                ->relationship('status', 'name')->required(),
                            Forms\Components\Checkbox::make('is_featured')
                                ->label('uitgelicht?')
                        ]

                    ),
                Forms\components\Select::make('shape_id')
                    ->relationship('alienShape', 'name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("sighting.user.name")->label('gebruikersnaam'),
                TextColumn::make("sighting.description")->label('omschrijving'),
                TextColumn::make("sighting.location")->label('locatie'),
                TextColumn::make('alienshape.name'),
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
            'index' => Pages\ListAlienSightings::route('/'),
            'create' => Pages\CreateAlienSighting::route('/create'),
            'edit' => Pages\EditAlienSighting::route('/{record}/edit'),
        ];
    }
}
