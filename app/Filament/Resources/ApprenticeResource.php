<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprenticeResource\Pages;
use App\Filament\Resources\ApprenticeResource\RelationManagers;
use App\Models\Apprentice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApprenticeResource extends Resource
{
    protected static ?string $model = Apprentice::class;

    protected static ?string $navigationGroup = 'Registro Aprendiz';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type_document_id')
                    ->label('Tipo de Documento')
                    ->relationship('typedocument', 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\TextInput::make('identification')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('regional_id')
                    ->relationship('regional','name')
                    ->required(),
                Forms\Components\Select::make('seat_id')
                    ->relationship('seat','name')
                    ->required(),
                Forms\Components\Select::make('program_id')
                    ->relationship('program','name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('typedocument.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('identification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('regional.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('seat.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('program.name')
                    ->numeric()
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
            'index' => Pages\ListApprentices::route('/'),
            'create' => Pages\CreateApprentice::route('/create'),
            'edit' => Pages\EditApprentice::route('/{record}/edit'),
        ];
    }
}
