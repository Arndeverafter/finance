<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteResource\Pages;
use App\Models\Account;
use App\Models\Waste;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class WasteResource extends Resource
{
    protected static ?string $model = Waste::class;

    protected static ?string $navigationIcon = 'heroicon-o-trash';

    protected static ?string $navigationGroup = 'Waste Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('waste_type_id')
                    ->relationship('waste_type', 'type')
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('account_id')
                    ->label('Account Details')
                    ->options(Account::with(['category'])->where('category_id', '1')->orderByDesc('date')->get(['date', 'id', 'shop_id'])->pluck('shopDateWaste', 'id')->take(40))
                    ->searchable()
                    ->hint('Only last 40 records will be shown here.')->hintColor('#e60000')
                    ->required(),
                Forms\Components\TextInput::make('measure')
                    ->columnSpan('full')
                    ->integer()
                    ->helperText('Example 2 to signify 2 Kgs')
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->hidden()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waste_type_id'),
                Tables\Columns\TextColumn::make('account_id'),
                Tables\Columns\TextColumn::make('measure'),
                Tables\Columns\TextColumn::make('total'),
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
            'index' => Pages\ListWastes::route('/'),
            'create' => Pages\CreateWaste::route('/create'),
            'edit' => Pages\EditWaste::route('/{record}/edit'),
        ];
    }
}
