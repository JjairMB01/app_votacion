<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionalResource\Pages;
use App\Filament\Resources\RegionalResource\RelationManagers;
use App\Models\Regional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegionalResource extends Resource
{
    protected static ?string $model = Regional::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administrar sedes';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre Regional')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label('Ubicacion')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('seat_id')
                    ->label('Sede')
                    ->relationship('Seat','name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre Regional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Ubicacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seat.name')
                    ->label('Nombre sede')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRegionals::route('/'),
            'create' => Pages\CreateRegional::route('/create'),
            'edit' => Pages\EditRegional::route('/{record}/edit'),
        ];
    }
}
