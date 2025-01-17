<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopResource\Pages;
use App\Filament\Resources\WorkshopResource\RelationManagers;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationLabel = 'Workshop';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Workshop"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label("Deskripsi"),
                Forms\Components\DateTimePicker::make('start_time')
                    // ->format('Y-m-d H:m')
                    // ->displayFormat('Y-m-d H:m')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Awal"),
                Forms\Components\DateTimePicker::make('end_time')
                    // ->format('Y-m-d H:m')
                    // ->displayFormat('Y-m-d H:m')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Akhir"),
                Forms\Components\Textarea::make('location')
                    ->required()
                    ->label("Lokasi"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Workshop"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label("Deskripsi"),
                Tables\Columns\TextColumn::make('start_time')
                    ->searchable()
                    ->label("Waktu Mulai"),
                Tables\Columns\TextColumn::make('end_time')
                    ->searchable()
                    ->label("Waktu Akhir"),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label("Lokasi"),
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
            'index' => Pages\ListWorkshops::route('/'),
            'create' => Pages\CreateWorkshop::route('/create'),
            'edit' => Pages\EditWorkshop::route('/{record}/edit'),
        ];
    }
}
