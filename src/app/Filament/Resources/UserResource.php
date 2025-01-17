<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Pendaftar Workshop';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.nim')
                    ->searchable()
                    ->label("Nomor Induk Mahasiswa"),
                Tables\Columns\TextColumn::make('student.name')
                    ->searchable()
                    ->label("Nama Lengkap"),
                Tables\Columns\TextColumn::make('student.major')
                    ->searchable()
                    ->label("Jurusan"),
                Tables\Columns\TextColumn::make('student.study_program')
                    ->searchable()
                    ->label("Program Studi"),
                Tables\Columns\TextColumn::make('student.year')
                    ->searchable()
                    ->label("Angkatan"),
                Tables\Columns\TextColumn::make('student.email')
                    ->searchable()
                    ->label("Alamat Email"),
                Tables\Columns\TextColumn::make('student.status')
                    ->searchable()
                    ->label("Status Mahasiswa"),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->recordUrl(null);
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

    public static function canCreate(): bool
    {
        return false;
    }
}
