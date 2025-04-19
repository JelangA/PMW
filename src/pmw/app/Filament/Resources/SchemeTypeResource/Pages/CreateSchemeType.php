<?php

namespace App\Filament\Resources\SchemeTypeResource\Pages;

use App\Filament\Resources\SchemeTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSchemeType extends CreateRecord
{
    protected static string $resource = SchemeTypeResource::class;

    protected static ?string $title = 'Tambah Jenis Skema';

    protected ?string $heading = 'Tambah Jenis Skema';
}
