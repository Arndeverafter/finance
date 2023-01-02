<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountResource\Pages;
use App\Models\Account;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    protected static ?string $navigationGroup = 'Day Account';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->hiddenOn('edit')
                    ->label('Category')
                    ->required(),
                Forms\Components\Select::make('shop_id')
                    ->relationship('shop', 'name')
                    ->preload()
                    ->label('Butcher Name')
                    ->hiddenOn('edit')
                    ->required(),
                Forms\Components\TextInput::make('set_price')
                    ->label('Set Price')
                    ->integer()
                    ->helperText('Price for Given Date should not contain Decimals')
                    ->required(),
                Forms\Components\TextInput::make('measure')
                    ->helperText('Non Integers should be given in Decimal Points Eg 1 to signify 1 kg etc')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->columnSpan('full')
                    ->hiddenOn('edit')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('shop.name'),
                Tables\Columns\TextColumn::make('set_price'),
                Tables\Columns\TextColumn::make('measure'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
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
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
            'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }
}
