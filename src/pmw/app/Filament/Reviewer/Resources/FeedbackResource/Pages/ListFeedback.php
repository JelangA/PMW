<?php

namespace App\Filament\Reviewer\Resources\FeedbackResource\Pages;

use App\Filament\Reviewer\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedback extends ListRecords
{
    protected static string $resource = FeedbackResource::class;

    protected static ?string $title = 'Penilaian Proposal';

    protected ?string $heading = 'Penilaian Proposal';

    protected ?string $subheading = 'Daftar proposal yang telah dinilai oleh anda';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
