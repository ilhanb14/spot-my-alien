<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SightingResource\Pages;
use App\Filament\Resources\SightingResource\RelationManagers;
use App\Filament\Widgets\SightingsInsight;
use App\Filament\Widgets\SightingsStatusInsight;
use App\Models\Sighting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SightingResource extends Resource
{
    protected static ?string $model = Sighting::class;
    protected static ?string $navigationGroup = 'Data';
    protected static ?string $label = "melding";
    protected static ?string $pluralModelLabel = 'meldingen';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ->relationship('status', 'name')->required(),
                Forms\Components\Checkbox::make('is_featured')
                ->label('uitgelicht?')


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Gebruikersnaam'),
                TextColumn::make('location')->label('Locatie'),
                TextColumn::make('description')->label('Omschrijving'),
                TextColumn::make('type.name')->label('Type'),
                TextColumn::make('created_at')->label('Gemaakt Op')->dateTime('m-d-Y h:i A'),
                TextColumn::make('status.name')
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'denied' => 'failed',
                        default => 'grey',
                    })
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSightings::route('/'),
            'create' => Pages\CreateSighting::route('/create'),
            'edit' => Pages\EditSighting::route('/{record}/edit'),
        ];
    }
}
