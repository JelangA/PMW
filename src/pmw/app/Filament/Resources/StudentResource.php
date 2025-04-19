<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Mahasiswa';

    protected static ?int $navigationSort = 0;

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
                Tables\Columns\TextColumn::make('nim')
                    ->searchable()
                    ->label("NIM"),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label("Nama Lengkap"),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label("Email"),
                Tables\Columns\TextColumn::make('major')
                    ->searchable()
                    ->label("Jurusan"),
                Tables\Columns\TextColumn::make('study_program')
                    ->searchable()
                    ->label("Program Studi"),
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->label("Angkatan"),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->label("Status"),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('year')
                    ->label('Angkatan')
                    ->options(Student::all()->pluck('year', 'year')),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
