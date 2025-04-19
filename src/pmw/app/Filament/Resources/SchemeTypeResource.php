<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchemeTypeResource\Pages;
use App\Filament\Resources\SchemeTypeResource\RelationManagers;
use App\Models\SchemeType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Scheme;

class SchemeTypeResource extends Resource
{
    protected static ?string $model = SchemeType::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationLabel = 'Jenis Skema';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Jenis Skema (Max: 100 Karakter)"),
                Forms\Components\Select::make('scheme_id')
                    ->label("Skema")
                    ->required()
                    ->options(Scheme::all()->pluck('name', 'id'))
                    ->searchable()
                    ->reactive()
                    // ->afterStateUpdated(function (Forms\Set $set, $state) {
                    //     if (empty($state)) {
                    //         $set('is_online', 1);
                    //     } else {
                    //         $set('is_online', 0);
                    //     }
                    // })
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('scheme.name')
                    ->searchable()
                    ->label("Nama Skema"),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label("Nama Jenis Skema"),
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
            'index' => Pages\ListSchemeTypes::route('/'),
            'create' => Pages\CreateSchemeType::route('/create'),
            'edit' => Pages\EditSchemeType::route('/{record}/edit'),
        ];
    }
}
