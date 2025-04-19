<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\ProposalResource\Pages;
use App\Filament\Student\Resources\ProposalResource\RelationManagers;
use App\Models\Proposal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Scheme;
use App\Models\SchemeType;
use App\Models\Lecture;
use App\Models\Student;
use Auth;

class ProposalResource extends Resource
{
    protected static ?string $model = Proposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Proposal';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('letter')
                    ->required()
                    ->label("Url Surat Ketersediaan Pembimbing"),
                Forms\Components\Select::make('nip')
                    ->label("Dosen Pembimbing")
                    ->required()
                    ->options(
                        Lecture::orderBy('name')->get()->mapWithKeys(function ($lecture) {
                            return [
                                $lecture->nip => "{$lecture->nip} - {$lecture->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('nim_leader')
                    ->label("Ketua")
                    ->required()
                    ->options(
                        Student::orderBy('name')->get()->mapWithKeys(function ($student) {
                            return [
                                $student->nim => "{$student->nim} - {$student->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('nim_member_1')
                    ->label("Anggota 1")
                    ->required()
                    ->options(
                        Student::orderBy('name')->get()->mapWithKeys(function ($student) {
                            return [
                                $student->nim => "{$student->nim} - {$student->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('nim_member_2')
                    ->label("Anggota 2")
                    ->required()
                    ->options(
                        Student::orderBy('name')->get()->mapWithKeys(function ($student) {
                            return [
                                $student->nim => "{$student->nim} - {$student->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('nim_member_3')
                    ->label("Anggota 3")
                    ->options(
                        Student::orderBy('name')->get()->mapWithKeys(function ($student) {
                            return [
                                $student->nim => "{$student->nim} - {$student->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\Select::make('nim_member_4')
                    ->label("Anggota 4")
                    ->options(
                        Student::orderBy('name')->get()->mapWithKeys(function ($student) {
                            return [
                                $student->nim => "{$student->nim} - {$student->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\TextInput::make('team_name')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Tim (Max: 60 Karakter)"),
                Forms\Components\TextInput::make('business_name')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Bisnis (Max: 100 Karakter)"),
                Forms\Components\Textarea::make('business_overview')
                    ->required()
                    ->label("Tinjauan Bisnis"),
                Forms\Components\TextInput::make('business_instagram')
                    ->required()
                    ->maxLength(255)
                    ->label("Instagram Bisnis (Max: 50 Karakter)"),
                Forms\Components\Textarea::make('business_situation')
                    ->required()
                    ->label("Situasi Bisnis"),
                Forms\Components\TextInput::make('submission_funds')
                    ->required()
                    ->maxLength(255)
                    ->prefix('Rp')
                    ->label("Pengajuan Dana (Max: 20 Karakter)"),
                Forms\Components\TextInput::make('turnover_target')
                    ->required()
                    ->maxLength(255)
                    ->prefix('Rp')
                    ->label("Pengajuan Dana (Max: 20 Karakter)"),
                Forms\Components\Select::make('scheme_type_id')
                    ->label("Jenis Skema")
                    ->required()
                    ->options(
                        SchemeType::with('scheme')->get()->mapWithKeys(function ($schemeType) {
                            $schemeName = $schemeType->scheme->name ?? 'Tidak Ditemukan';
                            return [
                                $schemeType->id => "{$schemeName} - {$schemeType->name}"
                            ];
                        })
                    )
                    ->searchable()
                    ->reactive(),
                Forms\Components\FileUpload::make('support_files')
                    ->label('Dokumen Pendukung (Proposal Dll)')
                    ->multiple()
                    ->required()
                    ->directory('support_files')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxFiles(5)
                    ->maxSize(2048),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('business_name')
                    ->searchable()
                    ->label("Nama Bisnis"),
                Tables\Columns\TextColumn::make('team_name')
                    ->searchable()
                    ->label("Nama Tim"),
                Tables\Columns\TextColumn::make('letter')
                    ->searchable()
                    ->label("Surat Ketersediaan Pembimbing")
                    ->url(fn ($record) => "/storage/{$record->letter}")
                    ->openUrlInNewTab(),
                Tables\Columns\BadgeColumn::make('status')
                    ->searchable()
                    ->label("Status")
                    ->color(fn (string $state): string => match ($state) {
                        'DIUSULKAN' => 'gray',
                        'DIVERIFIKASI' => 'primary',
                        'DISETUJUI' => 'success',
                        'LOLOS' => 'success',
                        'VERIFIKASI GAGAL' => 'danger',
                        'DITOLAK' => 'danger',
                        'TIDAK LOLOS' => 'danger',
                    }),
                Tables\Columns\TagsColumn::make('support_files')
                    ->label('File Pendukung')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        $files = $record->support_files ?? [];
                        array_unshift($files, '');

                        return array_map(function ($file) {
                            return '<a href="/storage/' . $file . '" target="_blank">' . basename($file) . '</a>';
                        }, $files);
                    })
                    ->html(),
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

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();

        $nim = $user->student->nim;

        return parent::getEloquentQuery()->where('nim_leader', $nim);
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
            'index' => Pages\ListProposals::route('/'),
            'create' => Pages\CreateProposal::route('/create'),
            'edit' => Pages\EditProposal::route('/{record}/edit'),
        ];
    }
}
