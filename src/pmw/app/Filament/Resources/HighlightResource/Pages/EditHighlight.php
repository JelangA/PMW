<?php

namespace App\Filament\Resources\HighlightResource\Pages;

use App\Filament\Resources\HighlightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHighlight extends EditRecord
{
    protected static string $resource = HighlightResource::class;

    protected static ?string $title = 'Ubah Highlight';

    protected ?string $heading = 'Ubah Highlight';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
