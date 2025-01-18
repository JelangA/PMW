<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationLabel = 'Kehadiran';

    protected static ?int $navigationSort = 3;

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
                Tables\Columns\TextColumn::make('workshop.title')
                    ->searchable()
                    ->label("Judul Workshop"),
                Tables\Columns\TextColumn::make('check_in_time')
                    ->searchable()
                    ->label("Presensi Awal"),
                Tables\Columns\TextColumn::make('check_out_time')
                    ->searchable()
                    ->label("Presensi Akhir"),
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
