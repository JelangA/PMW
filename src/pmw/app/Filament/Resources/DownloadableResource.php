<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadableResource\Pages;
use App\Filament\Resources\DownloadableResource\RelationManagers;
use App\Models\Downloadable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DownloadableResource extends Resource
{
    protected static ?string $model = Downloadable::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square-stack';

    protected static ?string $navigationLabel = 'Unduhan';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Unduhan (Max: 255 Karakter)"),
                Forms\Components\Textarea::make('url')
                    ->required()
                    ->label("Url Terkait"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Unduhan"),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->label("Url Terkait"),
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
            'index' => Pages\ListDownloadables::route('/'),
            'create' => Pages\CreateDownloadable::route('/create'),
            'edit' => Pages\EditDownloadable::route('/{record}/edit'),
        ];
    }
}
