<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineResource\Pages;
use App\Filament\Resources\TimelineResource\RelationManagers;
use App\Models\Timeline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Scheme;

class TimelineResource extends Resource
{
    protected static ?string $model = Timeline::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationLabel = 'Timeline';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label("Status")
                    ->required()
                    ->options([
                        'AKTIF' => 'AKTIF',
                        'NON-AKTIF' => 'NON-AKTIF',
                    ])
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('scheme_id')
                    ->label("Skema")
                    ->required()
                    ->options(Scheme::all()->pluck('name', 'id'))
                    ->searchable()
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('scheme.name')
                    ->searchable()
                    ->label("Nama Skema"),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->label("Status"),
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
            'index' => Pages\ListTimelines::route('/'),
            'create' => Pages\CreateTimeline::route('/create'),
            'edit' => Pages\EditTimeline::route('/{record}/edit'),
        ];
    }
}
