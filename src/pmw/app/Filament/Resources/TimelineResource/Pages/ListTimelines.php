<?php

namespace App\Filament\Resources\TimelineResource\Pages;

use App\Filament\Resources\TimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimelines extends ListRecords
{
    protected static string $resource = TimelineResource::class;

    protected static ?string $title = 'Timeline';

    protected ?string $heading = 'Timeline';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
