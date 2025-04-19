<?php

namespace App\Filament\Resources\LectureResource\Pages;

use App\Filament\Resources\LectureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLecture extends EditRecord
{
    protected static string $resource = LectureResource::class;

    protected static ?string $title = 'Ubah Dosen';

    protected ?string $heading = 'Ubah Dosen';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
