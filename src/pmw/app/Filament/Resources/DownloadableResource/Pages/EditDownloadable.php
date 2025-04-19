<?php

namespace App\Filament\Resources\DownloadableResource\Pages;

use App\Filament\Resources\DownloadableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDownloadable extends EditRecord
{
    protected static string $resource = DownloadableResource::class;

    protected static ?string $title = 'Ubah Unduhan';

    protected ?string $heading = 'Ubah Unduhan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
