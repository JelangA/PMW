<?php

namespace App\Filament\Reviewer\Resources\FeedbackResource\Pages;

use App\Filament\Reviewer\Resources\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedback extends EditRecord
{
    protected static string $resource = FeedbackResource::class;

    protected static ?string $title = 'Ubah Penilaian';

    protected ?string $heading = 'Ubah Penilaian';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
