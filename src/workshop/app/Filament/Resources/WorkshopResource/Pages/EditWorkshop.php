<?php

namespace App\Filament\Resources\WorkshopResource\Pages;

use App\Filament\Resources\WorkshopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshop extends EditRecord
{
    protected static string $resource = WorkshopResource::class;

    protected static ?string $title = 'Ubah Workshop';

    protected ?string $heading = 'Ubah Workshop';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
