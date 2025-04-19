<?php

namespace App\Filament\Resources\PractitionerResource\Pages;

use App\Filament\Resources\PractitionerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePractitioner extends CreateRecord
{
    protected static string $resource = PractitionerResource::class;

    protected static ?string $title = 'Tambah Juri Eksternal';

    protected ?string $heading = 'Tambah Juri Eksternal';
}
