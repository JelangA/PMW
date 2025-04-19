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

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Workshop (Max: 255 Karakter)"),
                Forms\Components\FileUpload::make('image')
                    ->label('Poster Workshop')
                    ->required()
                    ->image()
                    ->directory('workshop-images')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxSize(3072),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label("Deskripsi"),
                Forms\Components\DatePicker::make('scheduled_date')
                    // ->format('Y-m-d')
                    // ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Pelaksanaan"),
                Forms\Components\DatePicker::make('initial_registration_date')
                    // ->format('Y-m-d')
                    // ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Pendaftaran Awal"),
                Forms\Components\DatePicker::make('final_registration_date')
                    // ->format('Y-m-d')
                    // ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Pendaftaran Akhir"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Workshop"),
                Tables\Columns\TextColumn::make('scheduled_date')
                    ->searchable()
                    ->label("Tanggal Pelaksanaan"),
                Tables\Columns\TextColumn::make('initial_registration_date')
                    ->searchable()
                    ->label("Tanggal Pendaftaran Awal"),
                Tables\Columns\TextColumn::make('final_registration_date')
                    ->searchable()
                    ->label("Tanggal Pendaftaran Akhir"),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn ($record) => "/storage/{$record->image}")
                    ->label('Poster Workshop'),
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
