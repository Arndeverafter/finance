<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Models\Expense;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

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
                Forms\Components\TextInput::make('price')
                    ->helperText('Price for Given Date should not contain Decimals')
                    ->label('Item Cost')
                    ->default(0)
                    ->required(),
                Forms\Components\TextInput::make('measure')
                    ->helperText('This may be integers only to correspond with given Category, Eg. Meat, Salary etc')
                    ->default(1)
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->columnSpan('full')
                    ->default('Cost Effective')
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('measure'),
                Tables\Columns\TextColumn::make('description'),
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
