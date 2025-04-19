<?php

namespace App\Filament\Resources\TimelineResource\Pages;

use App\Filament\Resources\TimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeline extends EditRecord
{
    protected static string $resource = TimelineResource::class;

    protected static ?string $title = 'Ubah Timeline';

    protected ?string $heading = 'Ubah Timeline';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
