<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineTypeResource\Pages;
use App\Filament\Resources\TimelineTypeResource\RelationManagers;
use App\Models\TimelineType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Timeline;
use Carbon\Carbon;

class TimelineTypeResource extends Resource
{
    protected static ?string $model = TimelineType::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-right';

    protected static ?string $navigationLabel = 'Jenis Timeline';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Fase Timeline(Max: 70 Karakter)"),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->maxLength(255)
                    ->label("Urutan Timeline (Max: 4 Karakter)"),
                Forms\Components\DatePicker::make('start')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Awal"),
                Forms\Components\DatePicker::make('end')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Akhir"),
                Forms\Components\Select::make('timeline_id')
                    ->label("Tahun Timeline")
                    ->required()
                    ->options(Timeline::all()->pluck('created_at', 'id'))
                    ->searchable()
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label("Nama Fase Timeline"),
                Tables\Columns\TextColumn::make('order')
                    ->searchable()
                    ->label("Urutan"),
                Tables\Columns\TextColumn::make('start')
                    ->searchable()
                    ->label("Tanggal Awal"),
                Tables\Columns\TextColumn::make('end')
                    ->searchable()
                    ->label("Tanggal Akhir"),
                Tables\Columns\TextColumn::make('timeline.created_at')
                    ->searchable()
                    ->label("Tahun Timeline"),
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
            'index' => Pages\ListTimelineTypes::route('/'),
            'create' => Pages\CreateTimelineType::route('/create'),
            'edit' => Pages\EditTimelineType::route('/{record}/edit'),
        ];
    }
}
