<?php

namespace App\Filament\Reviewer\Resources\ProposalResource\Pages;

use App\Filament\Reviewer\Resources\ProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProposals extends ListRecords
{
    protected static string $resource = ProposalResource::class;

    protected static ?string $title = 'Proposal';

    protected ?string $heading = 'Proposal';

    protected ?string $subheading = 'Daftar proposal yang telah diverifikasi oleh Admin';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
