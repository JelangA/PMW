<?php

namespace App\Filament\Resources\TimelineTypeResource\Pages;

use App\Filament\Resources\TimelineTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimelineType extends CreateRecord
{
    protected static string $resource = TimelineTypeResource::class;

    protected static ?string $title = 'Tambah Jenis Timeline';

    protected ?string $heading = 'Tambah Jenis Timeline';
}
