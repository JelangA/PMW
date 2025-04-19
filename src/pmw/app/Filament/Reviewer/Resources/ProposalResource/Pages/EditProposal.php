<?php

namespace App\Filament\Reviewer\Resources\ProposalResource\Pages;

use App\Filament\Reviewer\Resources\ProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProposal extends EditRecord
{
    protected static string $resource = ProposalResource::class;

    protected static ?string $title = 'Catatan Revisi';

    protected ?string $heading = 'Catatan Revisi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $proposalId = $this->record->id;

        $revisionNotes = $this->form->getState()['revision_notes'];

        \App\Models\Feedback::create([
            'revision_notes' => $revisionNotes,
            'proposal_id' => $proposalId,
            'user_id' => auth()->id(),
        ]);
    }
}
