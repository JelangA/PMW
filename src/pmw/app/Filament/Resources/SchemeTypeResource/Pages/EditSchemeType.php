<?php

namespace App\Filament\Resources\SchemeTypeResource\Pages;

use App\Filament\Resources\SchemeTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchemeType extends EditRecord
{
    protected static string $resource = SchemeTypeResource::class;

    protected static ?string $title = 'Ubah Jenis Skema';

    protected ?string $heading = 'Ubah Jenis Skema';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
