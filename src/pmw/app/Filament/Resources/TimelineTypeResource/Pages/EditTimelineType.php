<?php

namespace App\Filament\Resources\TimelineTypeResource\Pages;

use App\Filament\Resources\TimelineTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimelineType extends EditRecord
{
    protected static string $resource = TimelineTypeResource::class;

    protected static ?string $title = 'Ubah Jenis Timeline';

    protected ?string $heading = 'Ubah Jenis Timeline';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
