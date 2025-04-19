<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProposalResource\Pages;
use App\Filament\Resources\ProposalResource\RelationManagers;
use App\Models\Proposal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProposalResource extends Resource
{
    protected static ?string $model = Proposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string $relationship = 'feedbacks';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('revision_notes')
                    ->required()
                    ->label('Catatan Revisi'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->label('Status')
                    ->options([
                        'DIVERIFIKASI' => 'DIVERIFIKASI',
                        'DISETUJUI' => 'DISETUJUI',
                        'LOLOS' => 'LOLOS',
                        'VERIFIKASI GAGAL' => 'VERIFIKASI GAGAL',
                        'DITOLAK' => 'DITOLAK',
                        'TIDAK LOLOS' => 'TIDAK LOLOS',
                    ]),
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
                Tables\Columns\TextColumn::make('feedbacks.revision_notes')
                    ->searchable()
                    ->label("Catatan Revisi"),
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
                // Tables\Columns\SelectColumn::make('status')
                //     ->options([
                //         'DIVERIFIKASI' => 'DIVERIFIKASI',
                //         'DISETUJUI' => 'DISETUJUI',
                //         'LOLOS' => 'LOLOS',
                //         'VERIFIKASI GAGAL' => 'VERIFIKASI GAGAL',
                //         'DITOLAK' => 'DITOLAK',
                //         'TIDAK LOLOS' => 'TIDAK LOLOS',
                //     ]),
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
            ]);
            // ->recordUrl(null);
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

    public static function canCreate(): bool
    {
        return false;
    }
}
