<?php

namespace App\Filament\Resources\TimelineTypeResource\Pages;

use App\Filament\Resources\TimelineTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimelineTypes extends ListRecords
{
    protected static string $resource = TimelineTypeResource::class;

    protected static ?string $title = 'Jenis Timeline';

    protected ?string $heading = 'Jenis Timeline';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
