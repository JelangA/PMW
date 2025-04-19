<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HighlightResource\Pages;
use App\Filament\Resources\HighlightResource\RelationManagers;
use App\Models\Highlight;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HighlightResource extends Resource
{
    protected static ?string $model = Highlight::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Highlight';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Highlight')
                    ->required()
                    ->image()
                    ->directory('highlight-images')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxSize(3072),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn ($record) => "/storage/{$record->image}")
                    ->label('Gambar Highlight'),
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
            'index' => Pages\ListHighlights::route('/'),
            'create' => Pages\CreateHighlight::route('/create'),
            'edit' => Pages\EditHighlight::route('/{record}/edit'),
        ];
    }
}
