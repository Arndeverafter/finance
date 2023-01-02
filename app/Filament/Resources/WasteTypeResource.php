<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteTypeResource\Pages;
use App\Models\WasteType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class WasteTypeResource extends Resource
{
    protected static ?string $model = WasteType::class;

    protected static ?string $navigationIcon = 'heroicon-o-variable';

    protected static ?string $navigationGroup = 'Waste Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->columnSpan('full')
                    ->placeholder('This Can be Water, Blood and Others')
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWasteTypes::route('/'),
            'create' => Pages\CreateWasteType::route('/create'),
            'edit' => Pages\EditWasteType::route('/{record}/edit'),
        ];
    }
}
