<?php

namespace App\Filament\Resources\DownloadableResource\Pages;

use App\Filament\Resources\DownloadableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDownloadable extends CreateRecord
{
    protected static string $resource = DownloadableResource::class;

    protected static ?string $title = 'Tambah Unduhan';

    protected ?string $heading = 'Tambah Unduhan';
}
