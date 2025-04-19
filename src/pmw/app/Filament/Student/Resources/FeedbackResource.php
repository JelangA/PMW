<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\FeedbackResource\Pages;
use App\Filament\Student\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Student\Widgets\FeedbackDropdownWidget;
use Auth;
use App\Models\Proposal;
use Filament\Tables\Filters\SelectFilter;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'Penilaian Proposal';

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
                Tables\Columns\TextColumn::make('revision_notes')
                    ->searchable()
                    ->label("Catatan Revisi"),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->label("Tanggal Revisi"),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Proposal::all()->pluck('business_name', 'id'))
                    ->attribute('proposal_id')
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();

        if ($user->student) {
            $nim = $user->student->nim;

            $proposalIds = Proposal::where('nim_leader', $nim)
                ->orWhere('nim_member_1', $nim)
                ->orWhere('nim_member_2', $nim)
                ->orWhere('nim_member_3', $nim)
                ->orWhere('nim_member_4', $nim)
                ->pluck('id');

            return parent::getEloquentQuery()->whereIn('proposal_id', $proposalIds);
        }

        return parent::getEloquentQuery()->whereNull('id');
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
