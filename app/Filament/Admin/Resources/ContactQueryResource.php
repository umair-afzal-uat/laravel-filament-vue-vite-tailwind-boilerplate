<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactQueryResource\Pages;
use App\Models\ContactQuery;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use Filament\Tables\Table;

class ContactQueryResource extends Resource
{
    protected static ?string $model = ContactQuery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Contact Queries';
    protected static ?string $pluralModelLabel = 'Contact Queries';
    protected static ?string $slug = 'contact-queries';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Full Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(50) // Show first 50 characters
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make()->modalHeading('View Contact Query')->form(fn ($record) => [
                    Forms\Components\TextInput::make('name')
                        ->label('Name')
                        ->default($record->name)
                        ->disabled(),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->default($record->email)
                        ->disabled(),

                    Forms\Components\Textarea::make('message')
                        ->label('Message')
                        ->default($record->message)
                        ->disabled(),

                    Forms\Components\DateTimePicker::make('created_at')
                        ->label('Submitted At')
                        ->default($record->created_at)
                        ->disabled(),
                ]),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListContactQueries::route('/'),
            
        ];
    }
}
