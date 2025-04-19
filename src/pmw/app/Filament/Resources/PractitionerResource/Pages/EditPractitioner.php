<?php

namespace App\Filament\Resources\PractitionerResource\Pages;

use App\Filament\Resources\PractitionerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPractitioner extends EditRecord
{
    protected static string $resource = PractitionerResource::class;

    protected static ?string $title = 'Ubah Juri Eksternal';

    protected ?string $heading = 'Ubah Juri Eksternal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
