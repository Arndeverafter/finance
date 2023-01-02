<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->placeholder('Johnny Mnemonic')
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->disabledOn('edit')
                    ->dehydrated(fn (Page $livewire) => $livewire instanceof CreateRecord)
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->required()
                    ->prefix('255')
                    ->maxLength(25)
                    ->columnSpan('full'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->hiddenOn('edit')
                    ->columnSpan('full')
                    ->maxLength(255),
                Select::make('role')
                    ->options([
                        'Admin' => 'Admin',
                        'Butcher' => 'Butcher',
                        'Accountant' => 'Accountant',
                        'Driver' => 'Driver',
                        'User' => 'User',
                    ])
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\DateTimePicker::make('email_verified_at')->hidden(),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('role')->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
