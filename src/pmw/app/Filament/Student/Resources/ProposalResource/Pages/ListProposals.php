<?php

namespace App\Filament\Student\Resources\ProposalResource\Pages;

use App\Filament\Student\Resources\ProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProposals extends ListRecords
{
    protected static string $resource = ProposalResource::class;

    protected static ?string $title = 'Proposal';

    protected ?string $heading = 'Proposal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
