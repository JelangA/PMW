<?php

namespace App\Filament\Student\Resources\ProposalResource\Pages;

use App\Filament\Student\Resources\ProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProposal extends EditRecord
{
    protected static string $resource = ProposalResource::class;

    protected static ?string $title = 'Ubah Proposal';

    protected ?string $heading = 'Ubah Proposal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
