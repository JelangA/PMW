<?php

namespace App\Filament\Resources\TimelineResource\Pages;

use App\Filament\Resources\TimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimeline extends CreateRecord
{
    protected static string $resource = TimelineResource::class;

    protected static ?string $title = 'Tambah Timeline';

    protected ?string $heading = 'Tambah Timeline';
}
