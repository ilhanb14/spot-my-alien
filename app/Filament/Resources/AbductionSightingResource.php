<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbductionSightingResource\Pages;
use App\Filament\Resources\AbductionSightingResource\RelationManagers;
use App\Models\AbductionSighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbductionSightingResource extends Resource
{
    protected static ?string $model = AbductionSighting::class;
    protected static ?string $label = 'ontvoering';
    protected static ?string $pluralLabel = 'ontvoeringen';
    protected static ?string $navigationGroup = 'Data';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->required()->maxLength(255)->label('voorwerp'),
                Forms\Components\TextInput::make('duration')
                    ->maxLength(255)->label('duur'),
                Forms\Components\Select::make('abduction_state_id')
                    ->relationship('abductionstate', 'name')->columnSpan(3)
                    ->label('Staat wanneer teruggevonden'),
                Forms\Components\Select::make('status_id')
                    ->relationship("status", 'name')
                    ->columnSpan(3)
                    ->label('Status'),
                Forms\Components\Checkbox::make('examination')->label("Onderzocht?"),
                Forms\Components\Checkbox::make('returned')->label('Teruggebracht?'),
                Forms\Components\Checkbox::make('live_subject')->label('levend voorwerp?'),
                Forms\Components\Select::make('sighting_id')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("sighting.user.name")->label('Gebruikersnaam'),
                TextColumn::make("sighting.description")->label('Omschrijving'),
                TextColumn::make("sighting.location")->label('Locatie'),
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
            'index' => Pages\ListAbductionSightings::route('/'),
            'create' => Pages\CreateAbductionSighting::route('/create'),
            'edit' => Pages\EditAbductionSighting::route('/{record}/edit'),
        ];
    }
}
