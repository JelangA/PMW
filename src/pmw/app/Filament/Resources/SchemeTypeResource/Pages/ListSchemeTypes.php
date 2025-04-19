<?php

namespace App\Filament\Resources\SchemeTypeResource\Pages;

use App\Filament\Resources\SchemeTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchemeTypes extends ListRecords
{
    protected static string $resource = SchemeTypeResource::class;

    protected static ?string $title = 'Jenis Skema';

    protected ?string $heading = 'Jenis Skema';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
