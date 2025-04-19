<?php

namespace App\Filament\Resources\LectureResource\Pages;

use App\Filament\Resources\LectureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLectures extends ListRecords
{
    protected static string $resource = LectureResource::class;

    protected static ?string $title = 'Dosen';

    protected ?string $heading = 'Dosen';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
