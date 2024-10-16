<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostulateResource\Pages;
use App\Filament\Resources\PostulateResource\RelationManagers;
use App\Models\Postulate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostulateResource extends Resource
{
    protected static ?string $model = Postulate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administrar votaciones';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('apprentice_id')
                    ->required()
                    ->relationship('apprentice','identification')
                    ->preload()
                    ->live()
                    ->searchable(),
                Forms\Components\TextInput::make('card')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('isEnabled')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('apprentice_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('card')
                    ->searchable(),
                Tables\Columns\IconColumn::make('isEnabled')
                    ->boolean(),
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
            'index' => Pages\ListPostulates::route('/'),
            'create' => Pages\CreatePostulate::route('/create'),
            'edit' => Pages\EditPostulate::route('/{record}/edit'),
        ];
    }
}
