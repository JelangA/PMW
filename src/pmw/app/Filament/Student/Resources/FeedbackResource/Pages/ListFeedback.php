<?php

namespace App\Filament\Student\Resources\FeedbackResource\Pages;

use App\Filament\Student\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedback extends ListRecords
{
    protected static string $resource = FeedbackResource::class;

    protected static ?string $title = 'Penilaian Proposal';

    protected ?string $heading = 'Penilaian Proposal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
