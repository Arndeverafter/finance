<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Account;
use App\Models\Discount;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Day Account';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('account_id')
                    ->label('Account Details')
                    ->options(Account::with(['category'])->where('category_id', '1')->orderByDesc('date')->get(['date', 'id', 'shop_id'])->pluck('shopDateWaste', 'id')->take(40))
                    ->searchable()
                    ->columnSpan('full')
                    ->hint('Only last 40 records will be shown here.')->hintColor('#e60000')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->integer()
                    ->helperText('Amount Discounted per Kg')
                    ->required(),
                Forms\Components\TextInput::make('measure')
                    ->integer()
                    ->helperText('Total Weight of Meat Discounted for.')
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
                Tables\Columns\TextColumn::make('account.id'),
                Tables\Columns\TextColumn::make('amount')->label('Discount'),
                Tables\Columns\TextColumn::make('measure')->label('Discounted Kilos'),
                Tables\Columns\TextColumn::make('total')->label('Total Discount'),
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
